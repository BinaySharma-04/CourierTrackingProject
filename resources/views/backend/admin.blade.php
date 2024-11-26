<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Dashboard</title>
    {{-- <link rel="stylesheet" href="admin.css"> --}}
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
    flex: 1;
    padding: 20px;
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

.dashboard {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}

.dashboard-item {
    background-color: #ecf0f1;
    padding: 20px;
    border-radius: 4px;
    text-align: center;
}

.dashboard-item p {
    margin-bottom: 10px;
}

.dashboard-item .item-title {
    font-weight: bold;
    font-size: 1.2em;
}

.dashboard-item .item-value {
    font-size: 2em;
    font-weight: bold;
}

.dashboard-item.blue {
    border: 2px solid blue;
}

.dashboard-item.red {
    border: 2px solid red;
}

.dashboard-item.yellow {
    border: 2px solid yellow;
}

.dashboard-item.black {
    border: 2px solid black;
}

.dashboard-item.pink {
    border: 2px solid pink;
}

.dashboard-item.cyan {
    border: 2px solid cyan;
}

.dashboard-item.green {
    border: 2px solid green;
}

.dashboard-item.lightgreen {
    border: 2px solid lightgreen;
}

.dashboard-item.maroon {
    border: 2px solid maroon;
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
                <li class="active"><a href="#">Dashboard</a></li>
                <li><a href="staff"> Staff</a></li>
                <li><a href="courier">Courier</a></li>
                <li><a href="complain">Complaints</a></li>
                <li><a href="customer">Customer</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header class="main-header">
                <h1>Dashboard</h1>
                <div class="user-profile">
                    <img src="profile-icon.png" alt="User Profile">
                </div>
            </header>
            <section class="dashboard">
                <div class="dashboard-item blue">
                    <p class="item-title">TOTAL COURIER</p>
                    <p class="item-value">{{$tc}}</p>
                </div>
                <div class="dashboard-item red">
                    <p class="item-title">TOTAL CUSTOMER</p>
                    <p class="item-value">{{$tcus}}</p>
                </div>
                <div class="dashboard-item maroon">
                    <p class="item-title">TOTAL ORDER CONFIRM</p>
                    <p class="item-value">{{$tcom}}</p>
                </div>
                <div class="dashboard-item yellow">
                    <p class="item-title">TOTAL COURIER PICKUP</p>
                    <p class="item-value">{{$Tpick}}</p>
                </div>
                <div class="dashboard-item pink">
                    <p class="item-title">INTRANSIT COURIER</p>
                    <p class="item-value">{{$transsit}}</p>
                </div>
                <div class="dashboard-item lightgreen">
                    <p class="item-title">TOTAL DELIVERED COURIER</p>
                    <p class="item-value">{{$delever}}</p>
                </div>
                <div class="dashboard-item blue">
                    <p class="item-title">TOTAL STAFF/EMP</p>
                    <p class="item-value">{{$tstaff}}</p>
                </div>
                <div class="dashboard-item red">
                    <p class="item-title">TOTAL COMPLAINTS</p>
                    <p class="item-value">{{$tcom}}</p>
                </div>
                
            </section>
        </main>
    </div>
</body>
</html>
