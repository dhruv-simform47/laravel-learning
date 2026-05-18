<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
  
</head>
<body>
    <x-header />
    Welcome to admin Login!

<form method="post" id="loginForm">
    @csrf
<br>    
name:
    <input type="email" name="email" id="email">   

    <br><br>
    Password:
    <input type="password" name="pass" id="pass">
    <br><br>
    <input type="submit" value="submit">
</form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$("#loginForm").on("submit",function(e){
e.preventDefault();
$.ajax({
    url:"/admin/login",
    type:"POST",
    data:$(this).serialize(),
    dataType:"json",
    success:function(response)
    {
        console.log(response);
        if(response.status =="success"){
      window.location.href="/admin/dashboard/"+response.email; }  
        else{
            alert("invalid data");
        }
    },
    error:function(xhr,status,error)
    {
        alert("Error occur"+ error);
    }
})
});

</script>

</body>
</html>