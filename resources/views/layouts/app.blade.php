<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        body{
            box-sizing: content-box;
            width: 100%;
            height: 100vh;
            background-image: url(https://c0.wallpaperflare.com/preview/354/766/467/pen-drawing-page-education-thumbnail.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group > label {
            margin-bottom: 0.1rem;
        }
    </style>
</head>
<body>
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>