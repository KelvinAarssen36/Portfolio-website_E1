<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Nieuw Project Toevoegen</title>
</head>
<body>
    @include('includes.header')

    <div class="home-container">
        <div class="content-wrapper2">
            <h1>Nieuw Project Toevoegen</h1>
            
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="project-form">
                @csrf
                <div class="form-group">
                    <label for="title">Titel</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Beschrijving</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" >
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="images">Afbeeldingen</label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple accept=".png, .jpg">
                </div> 
                <button type="submit" class="btn btn-primary">Opslaan</button>
            </form>
        </div>

        <div class="white-space"></div>
    </div>
</body>
</html>
