<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('images/new-logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/customer/customer-login.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Login - Customer</title>
</head>
<body>
<div class="login-page">
<div class="login-img">
    <img src="https://images.unsplash.com/photo-1663079899584-64acea4d6858?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
</div>
    <div class="login-details">
        <div class="login-logo">
            <img src="{{asset('images/new-logo.png')}}">
        </div>
        <div class="login-card">
            <h3 class="text-center">Login</h3>
            <div class="login-form">
                <form method="post" action="{{route('customer.store')}}">
                    @csrf
                <div class="row-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <p style="color: red">@error('email'){{$message}}@enderror</p>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <p style="color: red">@error('password'){{$message}}@enderror</p>
                    <input type="submit" value="login" class="form-control">
                </div>
                    <div class="below-login-btn">
                        <a href="#">Forgot password?</a>
                        <a href="{{route('customer.register')}}">Create a account</a>
                    </div>
                </form>
            </div>
        </div>
        @if (session('error'))
            <div class="alt alt-success">
                {{ session('error') }}
            </div>
            <script>
                setTimeout(function() {
                    $('.alert').fadeOut('fast');
                }, 4000);
            </script>
        @endif
    </div>
</div>
</body>
</html>
