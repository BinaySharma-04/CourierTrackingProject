<form id="addCourierForm" action="/addcourier" method="POST">
    @csrf
    <div class="sender">
        <h3>Sender Details</h3><br>
        <label for="senderName">Sender Name:</label>
        <input type="text" id="senderName" name="name" required>
        <label for="senderAddress">Sender Address:</label>
        <input type="text" id="senderAddress" name="address" required>
        <label for="sendingDestination">Sending Destination:</label>
        <input type="text" id="sendingDestination" name="destination" required>
    </div>
    <div class="reciever">
        <h3>Receiver Details</h3><br>
        <label for="receiverName">Receiver Name:</label>
        <input type="text" id="receiverName" name="r_name" required>
        <label for="receiverEmail">Receiver Email:</label>
        <input type="email" id="receiverEmail" name="r_email" required>
        <label for="receiverAddress">Receiver Address:</label>
        <input type="text" id="receiverAddress" name="r_address" required>
        <label for="phone">phone  :</label>
        <input type="text" id="phone" name="r_phone" required>
    </div>
    <div class="order">
        <h3>Order Details</h3><br>
        <label for="id">Courier id:</label>
        <input type="text" id="id" name="order_id" required>
        <label for="courierLocation">Courier Location:</label>
        <input type="text" id="courierLocation" name="location" required>
        <label for="courierWeight">Courier Weight:</label>
        <input type="text" id="courierWeight" name="weight" required>
        <label for="dimension">Dimension:</label>
        <input type="text" id="dimension" name="dimension" required>
        <label for="pacakgetype">Courier Status:</label>
        <select name="package" id="package">
            <option value="Box">Box</option>
            <option value="Document">Document</option>
            <option value="Crates">Crates</option>
            <option value="Bag">Bag</option>
        </select>
        <label for="message">Strict Message:</label>
        <input type="text" id="msg" name="msg" required>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Order Confirm">Order Confirm</option>
            <option value="Order Pickup">Order Pickup</option>
            <option value="In Transit">In Transit</option>
            <option value="Delivered">Delivered</option>
        </select>

        <button type="submit" id="btnadd">Add Courier</button>
    </div>
    
</form>