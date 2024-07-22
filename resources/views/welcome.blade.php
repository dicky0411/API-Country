<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Information</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(45deg, #ff00ff, #00ffff, #ffff00);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            margin: 0;
            padding: 0;
            color: rgb(237, 233, 157);
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
        }
        h1 {
            color: rgb(237, 233, 157);
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        p {
            font-size: 1.2em;
            margin: 10px 0;
            text-align: center;
            
        }
        strong {
            color: rgb(237, 233, 157);
        }
        .info-section {
            padding: 15px;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid #ffeb3b;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .error {
            color: #f44336;
            background: rgba(255, 235, 238, 0.8);
            border: 2px solid #f44336;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }
        .info {
            color: #4caf50;
            background: rgba(76, 175, 80, 0.2);
            border: 2px solid #4caf50;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }
        .search-form {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }
        .search-form input[type="text"] {
            padding: 12px;
            font-size: 1.2em;
            border: 2px solid #ffeb3b;
            border-radius: 25px 0 0 25px;
            width: 300px;
            box-sizing: border-box;
            outline: none;
            background: rgba(255, 255, 255,0.2);
            color: #fff;
            transition: border-color 0.3s, background 0.3s;
        }
        .search-form input[type="text"]:focus {
            color: rgb(237, 233, 157);
            background: rgb(237, 0, 157);
        }
        .search-form button {
            padding: 12px;
            font-size: 1.2em;
            border: 2px solid #ffeb3b;
            border-radius: 0 25px 25px 0;
            background: #ffeb3b;
            color: #333;
            cursor: pointer;
            width: 120px;
            margin-left: -1px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .search-form button:hover {
            background: #00bcd4;
            color: #fff;
            border-color: #00bcd4;
        }
        .search-form button:active {
            background: #0097a7;
            border-color: #0097a7;
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }
    </style>
</head>
<body>
    <div class="container">
        @if(isset($message))
            <div class="error">
                <h1>{{ $message }}</h1>
            </div>
        @else
            <h1>Country Information</h1>
            <p>Enter a country code after the URL. Country codes are usually 1-3 digits in length.</p>
            <div class="info-section">
                <p><strong>Country:</strong> {{ $country ?? 'Not Available' }}</p>
                <p><strong>Code:</strong> {{ $code ?? 'Not Available' }}</p>
                <p><strong>Traditional Chinese:</strong> {{ $tw ?? 'Not Available' }}</p>
                <p><strong>Locale:</strong> {{ $locale ?? 'Not Available' }}</p>
                <p><strong>Simplified Chinese:</strong> {{ $zh ?? 'Not Available' }}</p>
                <p><strong>Latitude:</strong> {{ $lat ?? 'Not Available' }}</p>
                <p><strong>Longitude:</strong> {{ $lng ?? 'Not Available' }}</p>
                <p><strong>Emoji:</strong> {{ $emoji ?? 'Not Available' }}</p>
            </div>
        @endif

        <!-- Search Form -->
        <div class="search-form">
            <form id="search-form" method="GET">
                <input type="text" id="country-code" name="code" placeholder="Enter country code" maxlength="5" required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('search-form');
            const input = document.getElementById('country-code');

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                const code = input.value.trim(); // Get the trimmed value from input
                if (code) {
                    // Redirect to the new URL with the country code
                    window.location.href = `/${code}`;
                }
            });
        });
    </script>
</body>
</html>
