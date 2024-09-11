<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use App\Models\Tag;  // Zorg ervoor dat je de Tag model importeert
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();
        
        $projects = Project::all();
        $tags = Tag::all(); // Voor het filterformulier

        // Filteren op tags
        if ($request->get('tag')) {
            $tag = Tag::find($request->get('tag'));
            $projects = $tag->projects;
        }

        return view('projects.index', compact('projects', 'tags'));
    }

    public function show(Project $project)
    {
        // Weergeven van een specifiek project met de bijbehorende tags
        return view('projects.show', compact('project'));
    }


    public function create()
    {
        if (Auth::check() && Auth::user()->administrator) {
            $tags = Tag::all(); // Ophalen van alle tags
            return view('projects.create', compact('tags'));
        }

        return redirect('/')->with('error', 'Niet geautoriseerd.');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
             'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'tags' => 'array'  // Validatie voor tags
         ]);

        $data = $request->all();

        $project = Project::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('projects'), $imageName);
                Image::create([
                    'name' => $imageName,
                    'project_id' => $project->id
                ]);
            }
        }

        $project->tags()->sync($data['tags'] ?? []);

        return redirect()->route('projects.index')->with('success', 'Project toegevoegd!');
    }

    public function edit(Project $project)
    {
        if (Auth::check() && Auth::user()->administrator) {
            $tags = Tag::all(); // Ophalen van alle tags
            return view('projects.edit', compact('project', 'tags'));
        }

        return redirect('/')->with('error', 'Niet geautoriseerd.');
    }

    public function update(Request $request, Project $project)
    {
        if (Auth::check() && Auth::user()->administrator) {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'tags' => 'array'  // Validatie voor tags
            ]);

            $project->update([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);

            if ($request->hasFile('images')) {
                $imagePaths = json_decode($project->images, true) ?: [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('projects', 'public');
                    $imagePaths[] = $path;
                }
                $project->images = json_encode($imagePaths);
                $project->save();
            }

            $project->tags()->sync($data['tags'] ?? []);

            return redirect()->route('projects.index')->with('success', 'Project bijgewerkt!');
        }

        return redirect('/')->with('error', 'Niet geautoriseerd.');
    }

    public function destroy(Project $project, Request $request)
    {
        if (!Auth::check() || !Auth::user()->administrator) {
            return redirect('/')->with('error', 'Niet geautoriseerd.');
        }

        $images = json_decode($project->images, true);
        if ($images) {
            foreach ($images as $image) {
                \Storage::disk('public')->delete($image);
            }
        }

        // Verwijder het project zelf
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project verwijderd!');
    }
}
