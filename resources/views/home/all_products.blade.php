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
      <title>E-prodaja</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>

         @include('home.header')
      
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               
               <div>
                  <form action="{{url('search_product')}}" method="get">
                     @csrf

                     <input style="width: 500px;" type="text" name="search" placeholder="Pretraga">
                     <input type="submit" value="Pretraži">

                  </form>
               </div>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}} 
            </div>
            @endif
            
            <div class="row">
            @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Detalji o proizvodu
                           </a>
                           <form action="{{url('add_cart',$products->id)}}" method="post">
                              
                           @csrf
                              <div class="row"> 
                                 <div class="col-md-4">
                                    <input type="number" name="quantity" 
                                    value="1" min="1" style="100px">
                                 </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Dodaj u korpu">
                                 </div>
                              </div>
                           </form>
                           
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>

                        @if($products->discount_price != null)
                        <h6 style="color: red;">
                           Cijena s popustom
                           <br/>
                           {{$products->discount_price}} KM
                        </h6>

                        <h6 style="text-decoration: line-through; color: blue;">
                           Cijena
                           <br/>
                           {{$products->price}} KM
                        </h6>

                        @else
                        <h6 style="color: blue;">
                           Cijena
                           <br/>
                           {{$products->price}} KM
                        </h6>

                        @endif


                        
                     </div>
                  </div>
               </div>
               
            @endforeach
            
            <span style="padding-top: 20px;">
            
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            
            </span>
         </div>
      </section>
      <!-- end product section -->
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