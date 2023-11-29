<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class="alert-success">Hello {{$maildata['username']}}</h1>
    <p>Thank you for your purchase, your order code is {{$maildata['bill_id']}}.</p>
    <p>We will deliver the order to you as soon as possible!</p>
</body>
</html>
