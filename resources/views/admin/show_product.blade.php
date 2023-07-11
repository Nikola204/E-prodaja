<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">

        .center{
            margin:auto;
            width:50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size{
            text-align:center;
            font-size: 40px;
            padding-top: 20px;
        }

        .img_size{
            width: 150px;
            height: 150px;
        }

        .th_color{
            background: skyblue;
        }

        .th_des{
            padding: 30px;
        }

        td {
            border-bottom: 2px solid white;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif

                <h2 class="font_size">Svi proizvodi</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_des">Ime proizvoda</th>
                        <th class="th_des">Opis</th>
                        <th class="th_des">Količina</th>
                        <th class="th_des">Kategorija</th>
                        <th class="th_des">Cijena</th>
                        <th class="th_des">Akcijska cijena</th>
                        <th class="th_des">Slika proizvoda</th>
                        <th class="th_des">Brisanje</th>
                        <th class="th_des">Uređivanje</th>
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}"/>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are You sure to delete this product?')" href="{{url('delete_product',$product->id)}}">Izbriši</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('edit_product',$product->id)}}">Uredi</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>  
    @include('admin.script')
  </body>
</html>