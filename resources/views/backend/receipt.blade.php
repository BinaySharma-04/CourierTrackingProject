<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .receipt {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        h1, h2 {
            text-align: center;
        }
        .details, .details th, .details td {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        .details th, .details td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Receipt</h1>
        <h2>Order #{{ $courier->order_id }}</h2>
        <table class="details">
            <tr><th>Sender</th><td>{{ $courier->name }}</td></tr>
            <tr><th>Recipient</th><td>{{ $courier->r_name }}</td></tr>
            <tr><th>Origin</th><td>{{ $courier->address }}</td></tr>
            <tr><th>Destination</th><td>{{ $courier->r_address }}</td></tr>
            <tr><th>Weight</th><td>{{ $courier->weight }} kg</td></tr>
            <tr><th>Status</th><td>{{ $courier->status }}</td></tr>
            <tr><th>Date</th><td>{{ $courier->created_at->format('d-m-Y') }}</td></tr>
        </table>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
