<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        li{
            margin-top: 10px;
        }
    </style>
</head>
<body>
<table class="table" style="width: 100%; background-color: lightyellow">
    <thead>
    <tr>
        <th scope="col" style="text-decoration: underline; width: 80%; text-align: center;">
            <h1>Warranty Certificate</h1>
        </th>
        <th scope="col" style="width: 20%;">
            <h3>TNWatch</h3>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <ul style="margin-top: 50px;">
                <li>Customer name: {{$bill->user->name}}</li>
                <li>Address: {{$bill->address}}</li>
                <li>Phone: {{$bill->phone}}</li>
                <li>Order No.{{$bill->id}}</li>
                <li>Warranty Start Date: {{$bill->created_at}}</li>
                <li>Warranty End Date: {{$bill->created_at->addYears(1)}}</li>
            </ul>
        </td>
        <td>
            <p>Pham Van Dong Street, Ha Noi, Viet Nam</p>
            <p>1900 1900</p>
            <p>nghetan07@gmail.com</p>
        </td>
    </tr>
    <tr>
        <td style="width: 80%;">
            <p>We hereby guarantee and warrant all products owned. for the period time the product in possession of the owner {{$bill->user->name}} will repair and replace defective component which will be no additional charge to the product owner. </p>
        </td>
    </tr>
    <tr>
        <td>
            <span>Date: {{$bill->created_at}}</span>
            <br>
            <span>Signature: TNWatch</span>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
