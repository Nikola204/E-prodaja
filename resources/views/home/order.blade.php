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
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>E-prodaja</title>
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
                width= 70%;
                padding 30px;
                padding-bottom: 30px;
                text-align: center;
            }

            table,th,td
            {
                border: 1px solid black;
            }

            .th_des
            {
                padding: 10px;
                background-color: skyblue;
                font-size: 20px;
                font-weight: bold;
            }
        </style>
   </head>
   <body>
    <div class="hero_area">
         @include('home.header')
        <div class="center">
            <table>
                <tr>
                    <th class="th_des">Naziv proizvoda</th>
                    <th class="th_des">Količina</th>
                    <th class="th_des">Cijena</th>
                    <th class="th_des">Status plaćanja</th>
                    <th class="th_des">Status dostave</th>
                    <th class="th_des">Slika</th>
                    <th class="th_des">Otkažite narudžbu</th>
                </tr>

                @foreach($order as $order)
                <tr>
                    <td>{{$order->product_title}}</td> 
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}} KM</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td> 
                    <td>
                        <img height="100" width="180" src="product/{{$order->image}}"/>
                    </td>     
                    <td>
                        @if($order->delivery_status=='Obrada')
                        <a onclick="return confirm('Jeste li sigurni da želite otkazati dostavu?!')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Otkažite dostavu</a>
                        @else
                        <p style="color: blue;">Nije dopušteno</p>
                        @endif
                    </td>         
                </tr>
                @endforeach
            </table>
        </div>      
    </div>
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <script src="home/js/popper.min.js"></script>
      <script src="home/js/bootstrap.js"></script>
      <script src="home/js/custom.js"></script>
   </body>
</html>