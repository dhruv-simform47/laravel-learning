<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shipment Form</title>
</head>

<body>
    <form action="{{ url('shipment') }}" method="post">
        @csrf
        <label for="weight">Weight Of Parcel</label> <br>
        <input type="number" name="weight" id="weight" />
        <br><br>
        <label for="delivery_partner">Delivery Partner</label> <br>
        <select name="delivery_partner" id="delivery_partner">
            <option value="fedex">FedEx</option>
            <option value="bluedart">Bluedart</option>
        </select>
        <input type="submit" value="submit">
    </form>
</body>

</html>
