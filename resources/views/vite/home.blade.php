<!DOCTYPE html>
<html>

<head>

    @vite('resources/js/app.js')

</head>

<body>

<div class="card">

    <h2 id="app-name"></h2>

    <p>
        API URL:
        <span id="api-url"></span>
    </p>

    <p id="message"></p>

    <img
        src="{{ Vite::asset('resources/images/logo.png') }}"
        width="200"
    >

</div>

</body>

</html>