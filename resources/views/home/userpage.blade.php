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
   </head>
   <body>
      <div class="hero_area">
         @include('home.header')
         @include('home.slider')
      </div>
      @include('home.why')
      
      
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      
      <!-- client section -->
      @include('home.us')
      <!-- end client section -->
      
      
   <script>
      document.addEventListener("DOMContentLoaded", function(event) { 
         var scrollpos = localStorage.getItem('scrollpos');
         if (scrollpos) window.scrollTo(0, scrollpos);
      });

      window.onbeforeunload = function(e) {
         localStorage.setItem('scrollpos', window.scrollY);
      };
   </script>
   <script>
      var link = document.getElementById("us");
      link.addEventListener("click", function(event) {
         event.preventDefault(); 
         var targetElement = document.getElementById("carouselExample3Controls");
         targetElement.scrollIntoView({ behavior: "smooth" });
});

    </script>
    
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