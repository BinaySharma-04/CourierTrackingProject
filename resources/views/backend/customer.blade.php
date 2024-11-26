<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Customer Management</title>
    <style>
        /* General styles for the admin panel */
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

        .customer-management {
            margin-top: 20px;
        }

        .add-customer-btn {
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #1abc9c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .customer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .customer-table th,
        .customer-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .customer-table th {
            background-color: #f2f2f2;
        }

        .customer-table tr:hover {
            background-color: #f1f1f1;
        }

        .edit-btn,
        .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #3498db;
            color: white;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 100%;
                height: auto;
            }
            .admin-panel {
                flex-direction: column;
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
                <li><a href="courier">Courier</a></li>
                <li><a href="complain">Complaints</a></li>
                <li class="active"><a href="#">Customer</a></li>
            
            </ul>
        </aside>
        <main class="main-content">
            <header class="main-header">
                <h1>Customer Management</h1>
                <div class="user-profile">
                    <img src="profile-icon.png" alt="User Profile">
                </div>
            </header>
            <section class="customer-management">
                <button class="add-customer-btn" id="addCustomerBtn">Add Customer</button>
                <table class="customer-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>login date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->created_at}}</td>
                           
                            <td>
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                         
                        <!-- Additional customer rows can go here -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- The Modal -->
    <div id="customerModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Add Customer</h2>
            <form id="customerForm">
                <label for="customerName">Name:</label>
                <input type="text" id="customerName" required>
                
                <label for="customerEmail">Email:</label>
                <input type="email" id="customerEmail" required>
                
                <label for="customerPhone">Phone:</label>
                <input type="tel" id="customerPhone" required>
                
                <button type="submit" class="add-customer-btn">Add Customer</button>
            </form>
        </div>
    </div>

    <script>
        // Get modal elements
        var modal = document.getElementById("customerModal");
        var addCustomerBtn = document.getElementById("addCustomerBtn");
        var closeModal = document.getElementById("closeModal");

        // Show the modal when the button is clicked
        addCustomerBtn.onclick = function() {
            modal.style.display = "block";
        }

        // Close the modal when the user clicks on <span> (x)
        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle form submission
        document.getElementById("customerForm").onsubmit = function(event) {
            event.preventDefault(); // Prevent page refresh
            var name = document.getElementById("customerName").value;
            var email = document.getElementById("customerEmail").value;
            var phone = document.getElementById("customerPhone").value;

            // Here, you can add the new customer to the table (this is a simple example)
            var table = document.querySelector(".customer-table tbody");
            var newRow = table.insertRow();
            newRow.innerHTML = `
                <td>${table.rows.length + 1}</td>
                <td>${name}</td>
                <td>${email}</td>
                <td>${phone}</td>
                <td>
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                </td>
            `;

            // Close the modal
            modal.style.display = "none";

            // Clear the form
            document.getElementById("customerForm").reset();
        }
    </script>
</body>
</html>
