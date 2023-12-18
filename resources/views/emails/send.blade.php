<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>هناك طلب جديد</title>
</head>

<body>
<h2>Order Code || {{$order['code']}}</h2>
<h2>Order price || {{$order['total']}}</h2>
<hr>
@foreach ($order['products'] as $prodcut)
<h3> Product || {{$prodcut['name']}}</h3>
<h3> Product || {{$prodcut['price']}}</h3>
<h3> photo || {{asset('dash/product/'.$prodcut['photo'])}}</h3>
<hr>
@endforeach 

<h2>User Name || {{$order['user']->name}}</h2>
<h2>Phone numbre || {{$order['user']->phone}}</h2>
<h2>Address || {{$order['user']->address}}</h2>
<h2>City || {{$order['user']->governorate}}</h2>

<br />
</body>
</body>

</html>
