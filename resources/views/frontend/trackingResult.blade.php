<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Result</title>
    <link rel="stylesheet" href="{{asset('css/trackingResult.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/t-awesome/6.6.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <style>
        .progress-container {
            background-color: #e0e0e0;
            border-radius: 25px;
            overflow: hidden;
            display: flex;
            align-items: center;
            margin: 40px;
        }

        .progress-bar {
            height: 30px;
            width: 0;
            background-color: #4caf50;
            transition: width 2s;
        }

        .status-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .status.active {
            font-weight: bold;
            color: #4caf50;
        }
    </style>
</head>
<body>
    @include('header.nav')
    <div class="trackingresult">
        <div id="heading"><h2>Order Tracking</h2></div>
        <div class="status">
            <h3><span id="trackingstatus">{{$courier->status}}</span></h3>
            <p>Your package has been {{$courier->status}} </p>
            <p><strong>Expected Delivery Date:</strong> <span class="deliverytime">2024-07-27</span></p>
        </div>
        
        
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>
   
        <div class="lists">
            <div class="list">
                <img src="images/checklist.png" alt="">
                <p id="status-order-confirmed">Order Confirmed</p>
            </div>
            <div class="list">
                <img src="images/truck.png" alt="">
                <p id="status-pickup">Order Picked</p>
            </div>
            <div class="list">
                <img src="images/location.png" alt="">
                <p id="status-in-transit">In Transit</p>
            </div>
            <div class="list">
                <img src="images/package-delivery.png" alt="">
                <p id="status-delivered">Order Arrived</p>
        </div>
        </div>
        
        <div class="detailsContainer">
            <div class="details">
                <h3>Order Details</h3>
                <label for="">Order ID:</label><span>{{$courier->order_id}}</span>
                <label for="">Weight:</label><span>{{$courier->weight}}</span>
                <label for="">Dimension:</label><span>{{$courier->dimension}}</span>
                <label for="">Package Type:</label><span>{{$courier->package}}</span>
                <label for="">Strict Message:</label><span>{{$courier->message}}</span>
            </div>
            <div class="details">
                <h3>Sender Details</h3>
                <label for="">Sender ID:</label><span>{{$courier->name}}</span>
                <label for="">Sender Address:</label><span>{{$courier->address}}</span>
                <label for="">Destination:</label><span>{{$courier->destination}}</span>
            </div>
            <div class="details">
                <h3>Receiver Details</h3>
                <label for="">Receiver Name:</label><span>{{$courier->r_name}}</span>
                <label for="">Receiver Email:</label><span>{{$courier->r_email}}</span>
                <label for="">Receiver Phone:</label><span>{{$courier->r_phone}}</span>
                <label for="">Receiver Address:</label><span>{{$courier->r_address}}</span>
            </div>
        </div>
    </div>
    @include('footer.footer')
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const progressBar = document.getElementById('progress-bar');

            function updateStatus(status) {
                let progressWidth='';

                switch (status) {
                    case 'Order Confirmed':
                        progressWidth = '9%';
                        break;
                    case 'Order Pickup': 
                        progressWidth = '37%';
                        break;
                    case 'In Transit':
                        progressWidth = '64%';
                        break;
                    case 'Delivered':
                        progressWidth = '100%';
                        break;
                    default:
                        progressWidth = '0%'; // Default for unknown statuses
                        break;
                }

                // Update progress bar width
                progressBar.style.width = progressWidth;

                // Update status classes
                const statuses = ['Order Confirmed', 'Order Pickup', 'In Transit', 'Delivered'];
                statuses.forEach((s, i) => {
                    const statusElement = document.getElementById(`status-${s.toLowerCase().replace(' ', '-')}`);
                    statusElement.classList.remove('active');
                    if (i <= statuses.indexOf(status)) {
                        statusElement.classList.add('active');
                    }
                });
            }

            // Initial call to update the status based on the courier's current status
            const initialStatus = document.getElementById('trackingstatus').innerText;
            updateStatus(initialStatus);
        });
    </script>
</body>
</html>
