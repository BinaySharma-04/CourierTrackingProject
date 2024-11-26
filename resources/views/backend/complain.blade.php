<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints - Admin Panel</title>
    <!-- <link rel="stylesheet" href="style3.css"> -->
    <style>
        /* General styles for admin panel */
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

        .complaints-management {
            margin-top: 20px;
        }
        .complaints-management h2{
            text-align: center;
            text-decoration: underline;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .add-complaint-btn {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .complaints-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .complaints-table th, .complaints-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .complaints-table th {
            background-color: #f2f2f2;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #f39c12;
            color: white;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <aside class="sidebar" aria-label="Sidebar">
            <div class="sidebar-header">
                <h2>ADMIN PANEL</h2>
            </div>
            <nav>
                <ul class="sidebar-menu">
                    <li><a href="admin">Dashboard</a></li>
                    <li><a href="staff">Staff</a></li>
                    <li><a href="courier">Courier</a></li>
                    <li class="active"><a href="#">Complaints</a></li>
                    <li><a href="customer">Customer</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header class="main-header">
                <h1>Complaints Management</h1>
                <div class="user-profile">
                    <img src="profile-icon.png" alt="User Profile">
                </div>
            </header>
            <section class="complaints-management">
                <h2>Complain Details</h2>
                <table class="complaints-table" aria-describedby="Complaints Management Table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Complaint Details</th>
                            <th>action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                             <td>{{$item->id}}</td>
                             <td>{{$item->name}}</td>
                             <td>{{$item->email}}</td>
                             <td>{{$item->phone}}</td>
                             <td>{{$item->msg}}</td>
                      <td>  <a href="/deletecom/{{$item->id}}" class="edit-btn">delete</a></td>
                        </tr>
                        @endforeach
                       
                        
                        <!-- Additional complaint rows can go here -->
                    </tbody>
                </table>
            </section>
        </main>
    </div>
</body>
</html>
