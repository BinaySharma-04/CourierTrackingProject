<!DOCTYPE html>
<html>
<head>
    <title>Courier Tracking</title>
</head>
<body>
    <h1>Courier List</h1>
    <ul>
        @foreach ($couriers as $courier)
            <li><a href="{{ url('/couriers', $courier->id) }}">{{ $courier->order_id }}</a></li>
        @endforeach
    </ul>
</body>
</html>
