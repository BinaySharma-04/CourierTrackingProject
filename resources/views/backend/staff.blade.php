<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Staff</title>
    <style>
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
        .staff-management {
            margin-top: 20px;
        }
        .add-staff-btn {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .add-staff-btn:hover {
            background-color: #27ae60;
        }
        .staff-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .staff-table th, .staff-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .staff-table th {
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

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        .modal h2{
    text-align: center;
    margin-bottom: 50px;
}
#addStaffForm button{
    padding: 10px;
    background-color: #fda929;
    border: none;
    border-radius: 5px;
}
        input {
            width: 80%;                 /* Full width inputs */
            padding: 8px;                /* Padding for inputs */
            margin-bottom: 10px;         /* Space below inputs */
            border: 1px solid #ccc;      /* Border for inputs */
            border-radius: 4px;          /* Rounded corners */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 500px; 
        }
        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
                <li class="active"><a href="#"> Staff</a></li>
                <li><a href="courier">Courier</a></li>
                <li><a href="complain">Complaints</a></li>
                <li><a href="customer">Customer</a></li>
               
            </ul>
        </aside>
        <main class="main-content">
            <header class="main-header">
                <h1>CMS Staff</h1>
                <div class="user-profile">
                    <img src="profile-icon.png" alt="User Profile">
                </div>
            </header>
            <section class="staff-management">
                <button class="add-staff-btn" onclick="openModal()">Add Staff</button>
                <table class="staff-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->password}}</td>
                            <td>{{$item->phone_num}}</td>
                            <td>
                                <a href="/staffedit/{{$item->id}}" class="edit-btn">Edit</a>
                                <a href="/deletestaff/{{$item->id}}" class="edit-btn">delete</a>
                             </td>
                     
                        </tr>
                        @endforeach
                        
                        <!-- Additional staff rows can go here -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- Add Staff Modal -->
    <div id="addStaffModal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>Add Staff</h2>
            <form id="addStaffForm" action="/addstaff" method="POST">
                @csrf
                <label for="staffId">Staff ID:</label><br>
                <input type="text" id="staffId" required><br>

                <label for="staffName">Name:</label><br>
                <input type="text" id="staffName" name="name" required><br>

                <label for="staffAddress">Address:</label><br>
                <input type="text" id="staffAddress" name="address" required><br>

                <label for="staffEmail">Emai:</label><br>
                <input type="email" id="staffEmail" name="email" required><br>

                <label for="staffEmail">Password:</label><br>
                <input type="password" id="password" name="password" required><br>

                <label for="staffPhone">Phone:</label><br>
                <input type="tel" id="staffPhone" name="phone" required><br>

                <button type="submit">Addd Staff</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("addStaffModal");

        // Get the button that opens the modal
        var btn = document.querySelector(".add-staff-btn");

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        

      
    </script>
</body>
</html>
