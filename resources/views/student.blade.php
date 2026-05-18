<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users From Db</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
</head>
<body>
    <h2>Student Table</h2>
    <table id="students">
        <thead>
            <th>RollNo</th>
            <th>name</th>
            <th>class</th>
        </thead>
        <tbody>
            @foreach($data as $student)
            <tr>
                <td>{{ $student->rollno }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class }}</td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>
    <script>
        $("#students").DataTable();
    </script>
</body>
</html>






