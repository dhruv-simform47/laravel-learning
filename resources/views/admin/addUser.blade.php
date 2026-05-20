<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AddUser</title>
</head>

<body>
    <div>
        <h3>Add New User </h3>

        <form method="POST" id="addForm">
            {{-- if csrf is not wrritten get error 419 page expire --}}
            @csrf
            Name:
            <input type="text" name="name" id="name"> <br><br>
            Email:
            <input type="email" name="email" id="email"> <br><br>
            Passwrod
            <input type="password" name="password" id="password"> <br><br>

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
                <input type="range" min="18" max="45" id="age" name="age">
            </div>

            <input type="submit" value="submit" />
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#addForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "/admin/add-user",
                type: "POST",
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.status == "success") {
                        window.location.href = "/admin/dashboard/" + response.email;
                    } else {

                        window.location.href = "/admin/add-user";
                    }
                },
                error: function(xhr, status, error) {

                    let errors = xhr.responseJSON.errors;

                    if (errors.email) {
                        alert(errors.email[0]);
                    }

                }
            });
        });
    </script>
</body>

</html>
