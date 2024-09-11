<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $project->title }}</title>
</head>
<body>
    @include('includes.header')

    <div class="project-show-container ">
        <h1>{{ $project->title }}</h1>

        <div class="project-description">
            <p>{{ $project->description }}</p>
        </div>

        <div class="w-96 h-96 aspect-square bg-black">

        </div>

        <div class="project-images">
            @foreach($project->images as $image)
            <img src="{{ asset('projects/' . $image->name) }}" alt="{{ $project->name }}" class="responsive-img w-12 aspect-square bg-black">
            @endforeach
        </div>

        <!-- Terug naar de projectenpagina -->
        <div class="back-to-projects">
            <a href="{{ route('projects.index') }}" class="btn btn-primary">Terug naar Projecten</a>
        </div>
    </div>
</body>
</html>
