<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
</head>
    @foreach($vehicle as $item)

        <h1>{{$item->name}}</h1>
        <h4>{{$item->brand}}</h4>
        <h4>{{$item->plate}}</h4>
        <h4>{{$item->color}}</h4>
        <hr>
        
    @endforeach
</body>
</html>