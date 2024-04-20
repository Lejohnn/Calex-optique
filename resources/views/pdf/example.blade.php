<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <img src="{{asset('frontend/logo_calex.jpg')}}" alt="" srcset="">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <p>{{ $content }}</p>
        <p>Ce PDF a été généré à partir d'une vue Blade dans Laravel à l'aide de Dompdf.</p>
    </div>
</body>
</html>
