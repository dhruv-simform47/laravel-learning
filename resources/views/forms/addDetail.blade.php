<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Detail </title>
    <style>
        .alert {
            color: red;
            /* border: 1px solid rgba(255, 0, 0, 0.5); */
            background-color: rgba(20, 4, 4, 0.322);
        }
    </style>
</head>

<body>
    <div>
        <h3>Your Details </h3>
        {{-- @if ($errors->any())
@foreach ($errors->all() as $error)
{{ $error }} 
@endforeach
@endif
--}}
        <form method="POST" id="addForm">
            {{-- if csrf is not wrritten get error 419 page expire --}}
            @csrf
            Name:
            <input type="text" name="name" id="name" value="{{ old('name') }}"">
            <span class="alert">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <br><br>
            Email:
            <input type="email" name="email" id="email" value="{{ old('email') }} "">
            <span class="alert"> @error('email')
                    {{ $message }}
                @enderror </span>

            <br><br>
            <div>
                Languages:
                <br><br>
                <input type="checkbox" name="lang[]" id="hindi" value="hindi">
                <label for="hindi">Hindi</label>
                <input type="checkbox" name="lang[]" id="gujarati" value="gujarati">
                <label for="gujarati">Gujarati</label>
                <input type="checkbox" name="lang[]" id="english" value="english">
                <label for="english">English</label>
            </div>
            <br><br>

            <div>
                Gender:
                <br><br>
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label>
            </div>
            <br><br>

            <div>
                City:
                <br><br>
                <select name="city" id="city">
                    <option value="baroda">Baroda</option>
                    <option value="ahmedabad">Ahmedabad</option>
                    <option value="Surat">Surat</option>
                </select>

            </div>
            <br><br>
            <div>
                Age:
                <br><br>
                <input type="text" id="age" name="age">
                <span class="alert">
                    @error('age')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <input type="submit" value="submit" />
        </form>
    </div>

</body>

</html>
