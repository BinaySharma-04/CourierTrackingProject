<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset("css/tracking.css")}}">
</head>
<body>
    @include("header.nav");
    <div class="container">
        <h1>Track Your Shipment</h1>
        <form action="{{ route('track.shipment') }}" method="POST">
            @csrf
            <div class="container1">
                <input type="text" name="order_id" placeholder="Enter your package number.....">
                <button type="submit" id="btnsearch">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
    </div>
    @include('footer.footer')
    <script href="script.js"></script>
    
</body>
</html>