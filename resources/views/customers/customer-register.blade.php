<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/customer/customer-registration.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Register - Customer</title>
</head>
<body>
<div class='register-page'>
    <div class="register-form">
        <div class="register-page-logo">
            <img src="{{asset('images/new-logo.png')}}">
        </div>
        <div class="customer-register-form">
            <form method="post" action="{{route('customer.store.user')}}">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                        <p style="color: red">@error('name'){{$message}}@enderror</p>
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <p style="color: red">@error('email'){{$message}}@enderror</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" name="dob" >
                        <p style="color: red">@error('dob'){{$message}}@enderror</p>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Address" name="address" >
                        <p style="color: red">@error('address'){{$message}}@enderror</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Mobile" name="mobile" >
                        <p style="color: red">@error('mobile'){{$message}}@enderror</p>
                    </div>
                    <div class="col">
                        <input type="password" class="form-control" placeholder="Password" name="password" >
                        <p style="color: red">@error('password'){{$message}}@enderror</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="form-control" value="Sign up">
                    </div>
                </div>
            </form>
                <div class="line">
                    <hr>
                    <p class="border border-gray-300">OR</p>
                    <hr>
                </div>
                <div class="external-login">
                    <button class="btn btn-white border-warning"><img src="https://pngimg.com/uploads/google/google_PNG19630.png" width="13%" height="22px"><a href="#">Sign in with google</a> </button>
                    <p>Already have an account  <a href="{{route('customer.login')}}"> Login</a> </p>
                </div>
        </div>
    </div>
    <div class="register-page-img">
        <img src="https://images.unsplash.com/photo-1607869549913-c73078fde439?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=725&q=80" width="100%" height="100%">
    </div>
</div>
</body>
</html>
