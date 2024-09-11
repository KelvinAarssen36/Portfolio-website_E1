<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Contactformulier</title>
</head>
<body>
    @include('includes.header')

    <div class="contact-container">
        <h1>Contactformulier</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea id="message" name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primaryform">Verstuur</button>
        </form>

        <!-- LinkedIn Profiel -->
        <div class="linkedin-section">
            <p>Volg mij ook op LinkedIn:</p>
            <a href="https://www.linkedin.com/in/kelvin-aarssen-54610a27a/" target="_blank" class="linkedin-link">
                <img src="{{ asset('images/linkedin-logo.png') }}" alt="LinkedIn" class="linkedin-logo">
            </a>
        </div>
    </div>
</body>
</html>
