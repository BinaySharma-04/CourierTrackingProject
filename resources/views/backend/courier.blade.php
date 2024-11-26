 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Courier</title>
    <style>
        /* Your existing styles remain unchanged */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            overflow: hidden;
        }

        .admin-panel {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: #ecf0f1;
            padding: 20px;
            position: fixed;
            height: 100vh;
            overflow: auto;
        }

        .sidebar-header {
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu li a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 4px;
        }

        .sidebar-menu li a:hover, .sidebar-menu li.active a {
            background-color: #2c3e50;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .main-header h1 {
            font-size: 2em;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .courier-management {
            margin-top: 20px;
        }

        .add-courier-btn {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .add-courier-btn:hover {
            background-color: #27ae60;
        }

        .courier-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .courier-table th, .courier-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .courier-table th {
            background-color: #f4f4f4;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.9em;
        }

        .edit-btn {
            background-color: #3498db;
            color: white;
        }

        .edit-btn:hover {
            background-color: #2980b9;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        /* Modal Styles */
        .modal {
            display: none;
            flex-direction: row;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        #addCourierForm {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .sender, .reciever, .order {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }

        label {
            display: block;
        }

        .modal h2 {
            text-align: center;
            margin-bottom: 50px;
        }

        input, select {
            width: 80%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #btnadd {
            display: inline;
            padding: 10px;
            background-color: #fda929;
            border: none;
            border-radius: 5px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            height: max-content;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        
        #courier-table button{
            margin: 5px;
        }

        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>ADMIN PANEL</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="admin">Dashboard</a></li>
                <li><a href="staff">Staff</a></li>
                <li class="active"><a href="courier">Courier</a></li>
                <li><a href="complain">Complaints</a></li>
                <li><a href="customer">Customer</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header class="main-header">
                <h1>Courier Management</h1>
                
            </header>
            <section class="courier-management">
                {{-- ////////////////////////////////////////////////  --}}
                <button class="add-courier-btn" id="openModal">Add Courier</button>
                
                <table class="courier-table" id="courier-table" border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Sender</th>
                            <th>Recipient</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->order_id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->r_name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->r_address}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>
                                <a href="/courieredit/{{$item->id}}" class="edit-btn">Edit</a>
                                <a href="/deletecourier/{{$item->id}}" class="edit-btn">Delete</a>
                             </td>
                        </tr>
                        @endforeach
                        <!-- Additional courier rows can go here -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- Modal for Adding Courier -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Add Courier</h2>
            {{-- onsubmit="return handleFormSubmit(event) --}}
            <form id="addCourierForm" action="/addcourier" method="POST"  >

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
        </div>
    </div>

<script>
        // document.getElementById('openModal').addEventListener('click', function() {
        //     document.getElementById('myModal').style.display = 'block';
        // });

        // document.getElementById('closeModal').addEventListener('click', function() {
        //     document.getElementById('myModal').style.display = 'none';
        // });

        // window.onclick = function(event) {
        //     if (event.target == document.getElementById('myModal')) {
        //         document.getElementById('myModal').style.display = 'none';
        //     }
        // };

        function searchCouriers() {
            const input = document.getElementById('search-input');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('courier-table');
            const tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let tdArray = tr[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < tdArray.length; j++) {
                    let td = tdArray[j];
                    if (td) {
                        if (td.innerText.toLowerCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = '';
                } else {
                    tr[i].style.display = 'none';
                }
            }
        }
</script>
<script>
        
        function handleFormSubmit(event) {
 
    event.preventDefault(); // Prevent the default form submission

    // Collect form data
    const formData = new FormData(document.getElementById('addCourierForm'));
    
    // Generate receipt content
    let receiptContent = `
    ------------------------------------------------------
                             RECEIPT                     
    ------------------------------------------------------

    Date: ${new Date().toLocaleDateString()}
    Time: ${new Date().toLocaleTimeString()}

    ------------------------------------------------------
                            SENDER DETAILS               
    ------------------------------------------------------
    Name:                ${formData.get('name')}
    Address:             ${formData.get('address')}
    Destination:         ${formData.get('destination')}

    ------------------------------------------------------
                            RECEIVER DETAILS             
    ------------------------------------------------------
    Name:                ${formData.get('r_name')}
    Email:               ${formData.get('r_email')}
    Address:             ${formData.get('r_address')}
    Phone:               ${formData.get('r_phone')}

    ------------------------------------------------------
                            ORDER DETAILS               
    ------------------------------------------------------
    Courier ID:         ${formData.get('order_id')}
    Courier Location:   ${formData.get('location')}
    Courier Weight:     ${formData.get('weight')}
    Dimension:          ${formData.get('dimension')}
    Package Type:       ${formData.get('package')}
    Message:            ${formData.get('msg')}
    Status:             ${formData.get('status')}

    ------------------------------------------------------
    Thank you for using our courier service!
    ------------------------------------------------------
    `;

    // Trigger download of the receipt
    const blob = new Blob([receiptContent], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'courier_receipt.txt'; // Name of the file to download
    document.body.appendChild(a);
    a.click(); // Initiates download
    document.body.removeChild(a);
    URL.revokeObjectURL(url); // Free up memory
}
</script>
</body>
</html>
