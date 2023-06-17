<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/customer/customer-navbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/hero.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/product.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/view_product.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/cart.css')}}">
    <link rel="stylesheet"href="{{asset('css/customer/my-cart.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/order.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/review.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer/footer.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
<div>
    @include('customers.navbar')
    @yield('content')
</div>
<script>
    $(document).ready(function (){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#search-input").keyup('input',function (){
            $input_search = $(this).val();
            if($input_search==''){
                console.log('hii');
                $('#search-result').html();
                $('#search-result').hide();
            }
            else{
                $.ajax({
                    method:"post",
                    url:"/search",
                    data:JSON.stringify({
                        input_search:$input_search
                    }),
                    headers:{
                        'Accept':'application/json',
                        'Content-type':'application/json'
                    },
                    success:function (data){
                        data = JSON.parse(data);
                        var searchResult = '';
                        $('#search-result').show();
                        for (let i=0;i<data.length;i++){
                            let productId = data[i].id;
                            let productLink = "{{route('customer.view.product','productId')}}".replace('productId',productId);
                            searchResult+=`<div class="searched-data"><a href="${productLink}">`+data[i].product_name+`</a><br></div>`
                        }
                        $('#search-result').html(searchResult)
                    }
                })
            }
        });
    });
</script>
</body>
</html>
