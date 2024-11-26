<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Courier</title>
    <style>
    /* Basic reset for margin and padding */
   
    
    /* Body styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }
    
    /* Form container styles */
    form {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
    }
    
    /* Heading styles */
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    
    /* Section heading styles */
    h3 {
        margin-bottom: 10px;
        color: #007BFF;
    }
    
    /* Input styles */
    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: border-color 0.3s;
    }
    
    /* Input focus styles */
    input[type="text"]:focus,
    input[type="email"]:focus,
    select:focus {
        border-color: #007BFF;
        outline: none;
    }
    
    /* Button styles */
    button {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }
    
    /* Button hover styles */
    button:hover {
        background-color: #0056b3;
    }
    
    /* Label styles */
    label {
        margin-bottom: 5px;
        display: block;
    }
    
    /* Responsive styles */
    @media (max-width: 600px) {
        form {
            padding: 15px;
        }
    
        button {
            font-size: 14px;
        }
    }
    </style>
</head>
<body>
    


        <h2>edit Courier</h2>
        <form id="addCourierForm" action="/editcourier/{{$c->id}}" method="POST">
            @csrf
            <div class="sender">
                <h3>Sender Details</h3><br>
                <label for="senderName">Sender Name:</label>
                <input type="text" id="senderName" name="name" required value="{{$c->name}}">
                <label for="senderAddress">Sender Address:</label>
                <input type="text" id="senderAddress" name="address" value="{{$c->address}}" required>
                <label for="sendingDestination">Sending Destination:</label>
                <input type="text" id="sendingDestination" name="destination" value="{{$c->destination}}" required>
            </div>
            <div class="reciever">
                <h3>Receiver Details</h3><br>
                <label for="receiverName">Receiver Name:</label>
                <input type="text" id="receiverName" name="r_name" value="{{$c->r_name}}" required>
                <label for="receiverEmail">Receiver Email:</label>
                <input type="email" id="receiverEmail" name="r_email" value="{{$c->r_email}}" required>
                <label for="receiverAddress">Receiver Address:</label>
                <input type="text" id="receiverAddress" value="{{$c->r_address}}" name="r_address" required>
                <label for="phone">phone  :</label>
                <input type="text" id="phone" value="{{$c->r_phone}}" name="r_phone" required>
            </div>
            <div class="order">
                <h3>Order Details</h3><br>
                <label for="id">Courier id:</label>
                <input type="text" id="id" name="order_id" value="{{$c->order_id}}" required>
                <label for="courierLocation">Courier Location:</label>
                <input type="text" id="courierLocation" value="{{$c->destination}}" name="location" required>
                <label for="courierWeight">Courier Weight:</label>
                <input type="text" id="courierWeight" name="weight" value="{{$c->weight}}" required>
                <label for="dimension">Dimension:</label>
                <input type="text" id="dimension" name="dimension" value="{{$c->dimension}}" required>
                <label for="pacakgetype">Courier Status:</label>
                <select name="package" id="package" value="{{$c->package}}">
                    <option value="Box">Box</option>
                    <option value="Document">Document</option>
                    <option value="Crates">Crates</option>
                    <option value="Bag">Bag</option>
                </select>
                <label for="message">Strict Message:</label>
                <input type="text" id="msg" name="msg" value="{{$c->message}}" required>
                <label for="status">Status:</label>
                <select name="status" id="status" value="{{$c->status}}">
                    <option value="Order Confirm">Order Confirm</option>
                    <option value="Order Pickup">Order Pickup</option>
                    <option value="In Transit">In Transit</option>
                    <option value="Delivered">Delivered</option>
                </select>

                <button type="submit" id="btnadd">Update Courier</button>
            </div>
            
        </form>

</body>
</html>