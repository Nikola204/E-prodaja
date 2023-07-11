<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <title>Web-shop</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

        <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table,th,td
        {
            border: 1px solid grey;
        }

        .th_deg
        {
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }

        .img_des
        {
            height: 200px;
            width: 200px;
        }
        
        .total_price
        {
            font-size: 20px;
            padding: 40px;    
        }
        </style>
   </head>
   <body>
      <div class="hero_area">
        @include('home.header')
         
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif
      
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product title</th>
                <th class="th_deg">Product quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>

            <?php
            $totalprice=0; 
            ?>
            @foreach($cart as $cart)
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>${{$cart->price}}</td>
                <td><img class="img_des" src="/product/{{$cart->image}}"/></td>
                <td>
                    <a class="btn btn-danger" onclick="return confirm('Are You sure to remove this product')" href="{{url('remove_cart',$cart->id)}}">
                        Remove
                    </a>
                </td>
            </tr>
            <?php
            $totalprice=$totalprice + $cart->price; 
            ?> 
            @endforeach
            <!-- {{$totalprice}} -->
        </table>
        <div>
            <h1 class="total_price">Total price: ${{$totalprice}}</h1>
        </div>
        <div>
            <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on delivery</a>
            <a href="" class="btn btn-danger">Pay using card</a>
        </div>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>