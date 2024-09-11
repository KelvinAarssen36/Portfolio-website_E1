<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Project Bewerken</title>
</head>
<body>
    @include('includes.header')

    <div class="home-container">
        <div class="content-wrapper2">
            <div class="next">
                <h1>Project Bewerken of</h1>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="verwijder-form" onsubmit="return confirmDeletion('{{ $project->title }}');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger verwijder">Verwijder Project</button>
            </form>

            </div>
            <!-- Formulier voor bewerken van project -->
            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="project-form">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Beschrijving</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" >
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ $project->tags->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="images">Afbeeldingen (optioneel)</label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple>
                </div>
                
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>

        </div>

        <div class="white-space"></div>
    </div>

    <script>
        function confirmDeletion(projectTitle) {
            return confirm(`Weet je zeker dat je het project "${projectTitle}" wilt verwijderen?`);
        }
    </script>
</body>
</html>
