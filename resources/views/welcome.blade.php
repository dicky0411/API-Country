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
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #222;
            font-size: 2.2em;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 1.1em;
            margin: 10px 0;
            text-align: center;
        }
        strong {
            color: #555;
        }
        .info-section {
            padding: 15px;
            margin-top: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .info-section p {
            margin: 0;
            font-size: 1.1em;
        }
        .error {
            color: #d9534f;
            background: #f2dede;
            border: 1px solid #d9534f;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }
        .info {
            color: #5bc0de;
            background: #d9edf7;
            border: 1px solid #5bc0de;
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
            font-size: 1em;
            border: 2px solid #333;
            border-radius: 25px 0 0 25px;
            width: 300px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s;
        }
        .search-form input[type="text"]:focus {
            border-color: #007bff;
        }
        .search-form button {
            padding: 12px;
            font-size: 1em;
            border: 2px solid #333;
            border-radius: 0 25px 25px 0;
            background: #333;
            color: #fff;
            cursor: pointer;
            width: 100px;
            margin-left: -1px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .search-form button:hover {
            background: #fff;
            color: #333;
            border-color: #333;
        }
        .search-form button:active {
            background: #555;
            border-color: #555;
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
