<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h1 class="font_size">Add product</h1>
                
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                        <lable>Product title:</lable>
                        <input type="text" class="text_color" name="title"
                        placeholder="Write a title" required=""/>
                    </div>

                    <div class="div_design">
                        <lable>Product description:</lable>
                        <input type="text" class="text_color" name="description"
                        placeholder="Write a description" required=""/>
                    </div>

                    <div class="div_design">
                        <lable>Product price:</lable>
                        <input type="number" class="text_color" name="price"
                        placeholder="Write a price" required=""/>
                    </div>

                    <div class="div_design">
                        <lable>Discount price:</lable>
                        <input type="number" class="text_color" name="dis_price"
                        placeholder="Write a discount price"/>
                    </div>

                    <div class="div_design">
                        <lable>Product quantity:</lable>
                        <input type="number" class="text_color" name="quantity"
                        placeholder="Write a quantity" min="0" required=""/>
                    </div>


                    <div class="div_design">
                        <lable>Product Category:</lable>
                        <select class="text_color" name="category" required="">
                            <option value="" selected="">Add a category here</option> 
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">
                                {{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <lable>Product image here:</lable>
                        <input type="file" name="image"/>
                    </div>

                    <div class="div_design">
                        <input type="submit" value="Add product" class="btn btn-primary"/>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- @include('admin.body') -->
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>