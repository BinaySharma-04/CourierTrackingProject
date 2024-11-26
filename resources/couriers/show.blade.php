<!DOCTYPE html>
<html>
<head>
    <title>Courier Tracking</title>
    <style>
        .progress-bar {
            width: 100%;
            background-color: #f3f3f3;
        }
        .progress {
            width: {{ $progress }}%;
            background-color: #4caf50;
            height: 30px;
            text-align: center;
            line-height: 30px;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Order ID: {{ $courier->order_id }}</h1>
    <div class="progress-bar">
        <div class="progress">{{ $courier->status }}</div>
    </div>
    <form action="{{ url('/couriers', [$courier->id, 'update']) }}" method="POST">
        @csrf
        <label for="status">Update Status:</label>
        <input type="text" id="status" name="status" value="{{ $courier->status }}">
        <button type="submit">Update</button>
    </form>
</body>
</html>
