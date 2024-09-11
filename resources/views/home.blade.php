@yield('content')
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Metamorphous&family=Monoton&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <!-- begin zichtbare content -->
    <body>
        @include('includes.header') <!-- Voegt header toe -->
        
        <div class="home-container">
            <div class="content-wrapper">
                <!-- Links: Afbeelding -->
                <div class="image-section">
                    <img src="{{ asset('images/software.jpg') }}" alt="Jouw afbeelding" class="responsive-img">
                </div>

                <!-- Rechts: Dummy tekst -->
                <div class="text-section">
                    <h1>Welkom op mijn Portfolio website!</h1>
                    <p>
                        Ik ben blij dat je hier bent. Op deze website vind je een overzicht van mijn projecten en werk.
                         Voel je vrij om door mijn projecten te bladeren en een kijkje te nemen bij de verschillende creaties en ideeën waar ik aan heb gewerkt.
                         Als je geïnteresseerd bent in verdere details of vragen hebt over een specifiek project, aarzel dan niet om verder te verkennen en contact met mij op te nemen.
                    </p>
                </div>
            </div>

            <div class="white-space"></div>

            <!-- Google Maps Sectie -->
            <div class="map-section">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2461.6705200350663!2d4.4614844161272575!3d51.53540827963942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6e7aeb456fb69%3A0x7d7fe048d43ecfa8!2sKnipplein%2011%2C%204702%20JD%20Roosendaal!5e0!3m2!1snl!2snl!4v1637175683714!5m2!1snl!2snl"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </body>
