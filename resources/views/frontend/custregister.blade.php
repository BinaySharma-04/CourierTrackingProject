<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register</title>
    <link rel="stylesheet" href="{{ asset('css/custlogin.css') }}">
</head>
<body>
    @include("header.nav")
    
    <div class="container">
        <div class="container1">
            <h2>Customer Register</h2>
            
            @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('registerPost') }}" method="POST">

                @csrf
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="name">
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required name="email">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label>Password</label>
                </div>
                
                <button type="submit" class="btn">Sign up</button>
            </form>
        </div>
    </div>
    
    @include('footer.footer')
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
