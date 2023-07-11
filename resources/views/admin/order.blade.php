<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .title_des
        {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_des
        {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .th_des
        {
            background-color: skyblue;
        }

        .image_size
        {
            width: 200px;
            height: 150px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_des">Narudžbe</h1>

                <div style="margin-left: 400px; padding-bottom: 30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color: black;" name="search" placeholder="Pretraži proizvode"/>
                        <input type="submit" value="Pretraži" class="btn btn-outline-primary"/>
                    </form>
                </div>
                <table class="table_des">
                    <tr class="th_des">
                        <th>Ime</th>
                        <th>Email</th>
                        <th>Adresa</th>
                        <th>Telefon</th>
                        <th>Ime proizvoda</th>
                        <th>Količina</th>
                        <th>Cijena</th>
                        <th>Status plaćanja</th>
                        <th>Status dostave</th>
                        <th>Slika</th>
                        <th>Dostavljeno</th>
                    </tr>

                    @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="image_size" src="/product/{{$order->image}}"/>
                        </td>
                        <td>
                            @if($order->delivery_status == 'processing')
                            <a href="{{url('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered?!')">
                                Dostavljeno
                            </a>
                            @else
                            <p style="color: green;">Dostavljeno</p>
                            @endif
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="11">
                            Nisu pronađeni podaci
                        </td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>
    @include('admin.script')
  </body>
</html>