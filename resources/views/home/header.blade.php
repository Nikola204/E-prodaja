<header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><h1><span style="color: #f7444e;; font-size: 50px;">E-</span><span style="color: #131313; font-size: 50px;">prodaja</span></h1></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{url('/')}}">Početna <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Proizvodi</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="" id="us">O nama</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Korpa</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order')}}">Narudžbe</a>
                        </li>
               
                      

                        @if (Route::has('login'))
                        @auth

                        <li class="nav-item">
                           <x-app-layout>
                           </x-app-layout>                        
                        </li>

                        @else

                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Prijava</a>
                        </li>

                        <li class="nav-item">
                           <a class="btn btn-success" href="{{ route('register') }}">Registracija</a>
                        </li>

                        @endauth
                        @endif
                        
                     </ul>
                  </div>
               </nav>
            </div>
         </header>