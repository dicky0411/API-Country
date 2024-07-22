<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Information</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @if(isset($message))
            <h1>{{ $message }}</h1>
        @else
            <h1>Country Information</h1>
            <p><strong>Country:</strong> {{ $country }}</p>
            <p><strong>Code:</strong> {{ $code }}</p>
            <p><strong>Traditional Chinese:</strong> {{ $tw }}</p>
            <p><strong>Locale:</strong> {{ $locale }}</p>
            <p><strong>Simplified Chinese:</strong> {{ $zh }}</p>
            <p><strong>Latitude:</strong> {{ $lat }}</p>
            <p><strong>Longitude:</strong> {{ $lng }}</p>
            <p><strong>Emoji:</strong> {{ $emoji }}</p>
        @endif
    </div>
</body>
</html>
