<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin     Login</title>
    <link rel="stylesheet" href="{{asset("css/adminlogin.css")}}">
</head>
<body>
    <br><br><br>
    {{-- @include("header.nav") --}}
    <div class="container">
       <div class="container1">
        <h2>Admin Login</h2>
        @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif



<form action="/admin" method="POST">

            @csrf
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" required name="email">
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
               <input type="password" required name="password">
                <label>Password</label>
            </div>
            
            @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <button type="submit" class="btn">Login</button>
            
        </form>
      </div>
    </div>
    {{-- @include('footer.footer') --}}
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>