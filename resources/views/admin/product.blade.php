<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        
            .div_center {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100%;
}
        

        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color{
            color: black;
            padding-bottom: 20px;
        }

        label{
            display: inline-block;
            width: 200px;
        }

        /* .div_design{
            padding-bottom: 15px;
        } */

        .div_design {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.div_design label {
    margin-right: 10px;
    width: 150px;
}

.div_design input, 
.div_design select {
    flex: 1;
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
            
                <div class="div_center">
                    <h1 class="font_size">Dodaj proizvod</h1>
                
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <lable>Ime proizvoda:</lable>
                        <input type="text" class="text_color" name="title"
                        placeholder="Unesite ime" required=""/>
                    </div>

                    <div class="div_design">
                        <lable>Opis proizvoda:</lable>
                        <input type="text" class="text_color" name="description"
                        placeholder="Unesite opis" required=""/>
                    </div>

                    <div class="div_design">
                        <lable>Cijena proizvoda:</lable>
                        <input type="number" class="text_color" name="price"
                        placeholder="Unesite cijenu" required=""/>
                    </div>

                    <div class="div_design">
                        <lable>Akcijska cijena:</lable>
                        <input type="number" class="text_color" name="dis_price"
                        placeholder="Unseite akcijsku cijenu"/>
                    </div>

                    <div class="div_design">
                        <lable>Količina proizvoda:</lable>
                        <input type="number" class="text_color" name="quantity"
                        placeholder="Unesite količinu" min="0" required=""/>
                    </div>


                    <div class="div_design">
                        <lable>Kategorija proizvoda:</lable>
                        <select class="text_color" name="category" required="">
                            <option value="" selected="">Ovdje dodaj kategoriju</option> 
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">
                                {{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>  

                    <div class="div_design">
                        <lable>Slika proizvoda:</lable>
                        <input type="file" name="image" required=""/>
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Dodaj produkt" class="btn btn-primary"/>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
    @include('admin.script')
  </body>
</html>