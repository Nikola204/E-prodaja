<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller{
    
    public function view_category(){

        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $data=category::all();
            return view('admin.category',compact('data'));
            }
            else
            {
            return redirect('login'); 
            }  
        }
        else
        {
            return redirect('login'); 
        }        
    }

    public function add_category(Request $request){

        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $data=new category;
            $data->category_name=$request->category;
            $data->save();  
            return redirect()->back()->with('message','Kategorija uspješno dodana');
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function delete_category($id){
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $data=category::find($id);
            $data->delete();
            return redirect()->back()->with('message','Kategorija uspješno izbrisana');
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function view_product(){
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $category=category::all();
            return view('admin.product',compact('category')); 
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function add_product(Request $request){
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $product = new product;
            $product->title=$request->title;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->quantity=$request->quantity;
            $product->discount_price=$request->dis_price;
            $product->category=$request->category;

            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;

            $product->save();
            return redirect()->back()->with('message','Produkt uspješno dodan');
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function show_product(){
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $product=product::all();
            return view('admin.show_product',compact('product'));
            }
            else 
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function delete_product($id){
        
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $product=product::find($id);
            $product->delete();
            return redirect()->back()->with('message','Produkt uspješno izrisan');
            }
            else 
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
        
    }

    public function edit_product($id)
    {   
        
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
            $product=product::find($id);
            $category=category::all();
            return view('admin.edit_product',compact('product','category'));        
            }
            else 
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function edit_product_confirm(Request $request, $id)
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
                $product=product::find($id);
                $product->title=$request->title;
                $product->description=$request->description;
                $product->price=$request->price;
                $product->quantity=$request->quantity;
                $product->discount_price=$request->dis_price;
                $product->category=$request->category;

                $image=$request->image;
                if($image)
                {
                    $imagename=time().'.'.$image->getClientOriginalExtension();
                    $request->image->move('product',$imagename);
                    $product->image=$imagename;
                }
        

                $product->save();

                return redirect()->back()->with('message','Produkt uspješno ažuriran');
            }
            else 
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }   
        
    }

    public function order()
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
                $order=order::all();
                return view('admin.order',compact('order'));
            }
            else 
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function delivered($id)
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
                $order=order::find($id);
                $order->delivery_status="Dostavljeno"; 
                $order->payment_status="Plaćeno";      
    
                $order->save();
                return redirect()->back();
            }
            else 
            {
                return redirect('login');
            } 
        }
        else
        {
            return redirect('login'); 
        }
        
    }

    public function searchdata(Request $request)
    {
        if(Auth::id())
        {
            $usertype = Auth::user()->usertype;
            if($usertype == '1')
            {
                $searchText=$request->search;
                $order=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();

                return view('admin.order',compact('order'));
            }
            else
            {
                return redirect('login');
            }
        }
        else
        {
            return redirect('login'); 
        }
        
    }
}
 