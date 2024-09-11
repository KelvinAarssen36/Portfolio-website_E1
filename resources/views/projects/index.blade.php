<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Metamorphous&family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Mijn Projecten</title>
</head>
<body>
    @include('includes.header') <!-- Voeg header toe -->

    <div class="projects-container">
        <!-- Header Section -->
        <div class="header-section">
            <h1>Mijn Projecten</h1>
            @auth
                @if(Auth::user()->administrator)
                    <!-- Knop om een nieuw project toe te voegen -->
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">Nieuw project toevoegen</a>
                @endif
            @endauth
        </div>

        <!-- Filtering Form -->
        <div class="filter-section">
            <form action="{{ route('projects.index') }}" method="GET" class="filter-form">
                <label for="tag">Filter op tags:</label>
                <select name="tag" id="tag">
                    <option value="0" >Niet Filteren</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <!-- Dummy Text -->
        <div class="dummy-text">
            <p>Welkom op de projectenpagina. Hier kun je een overzicht van alle projecten bekijken waar ik aan heb gewerkt.</p>
        </div>

        <!-- Project Grid -->
        <div class="projects-grid">
            @if($projects->count() > 0)
                @foreach($projects as $project)
                    <div class="project-item">
                        <!-- Projectbeschrijving -->
                        <div class="text-section">
                            <h2>{{ $project->title }}</h2>
                            <p>{{ $project->description }}</p>
                            <!-- Toon tags -->
                            @if($project->tags->count())
                                <div class="tags">
                                    @foreach($project->tags as $tag)
                                        <span class="tag">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <!-- Projectafbeeldingen -->
                            <div class="image-section">
                                @foreach($project->images as $image)
                                <img src="{{ asset('projects/' . $image->name) }}" alt="{{ $project->name }}" class="responsive-img">
                                @endforeach
                            </div>
                        </div>

                        @auth
                            @if(Auth::user()->administrator)
                                <!-- Bewerken en Verwijderen Knoppen -->
                                <div class="actions linkknop">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-secondary">Bewerken</a>
                                </div>
                                <div class="actions linkknop">
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">Bekijk</a>
                                </div>
                            @else
                                <div class="actions linkknop">
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">Bekijk</a>
                                </div>
                            @endif
                        @else
                            <div class="actions linkknop">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary">Bekijk</a>
                            </div>
                        @endauth
                        
                    </div>
                @endforeach
            @else
                <p>Er zijn nog geen projecten toegevoegd.</p>
            @endif
        </div>
    </div>
</body>
</html>
