<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base</title>
</head>

<body>
    <h1> hello this is base file </h1>

    {{ $email }}
    current url: {{ URL::current() }}
    <br>
    <br>
    previous url: {{ url()->previous() }}


</body>

</html>
