<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;  
use App\Models\Order;  


class HomeController extends Controller
{
    public function index(){
        $product=product::paginate(9);
        return view('home.userpage',compact('product'));
    }
    public function redirect(){ 
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $total_product=product::all()->count();
            $total_user=user::all()->count();
            $total_order=order::all()->count();

            $order=order::all();
            $total_revenue=0;
            foreach($order as $order)
            {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','=','Dostavljeno')->get()->count(); //ovo ispravi

            $total_processing=order::where('delivery_status','=','Obrada')->get()->count();  //ovo ispravi

            
            return view('admin.home',compact('total_product','total_user','total_order','total_revenue','total_delivered','total_processing'));
        }else{
            $product=product::paginate(6);
            return view('home.userpage',compact('product'));
        }
    }

    public function product_details($id){
        
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);
            $product_exist_id=cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;

                if($product->discount_price != NULL)
                {
                    $cart->price=$product->discount_price * $cart->quantity;             
                }else
                {
                    $cart->price=$product->price * $cart->quantity;
                }

                $cart->save();
                return redirect()->back()->with('message','Proizvod je dodan u korpu');

                
            }
            else
            {
                $cart= new cart;

                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;

                if($product->discount_price != NULL)
                {
                    $cart->price=$product->discount_price * $request->quantity;           
                }else
                {
                    $cart->price=$product->price * $request->quantity;
                }
                    $cart->product_title=$product->title;
                    $cart->image=$product->image;
                    $cart->product_id=$product->id;
                    $cart->quantity=$request->quantity;
                
                    $cart->save();

                    return redirect()->back()->with('message','Proizvod je dodan u korpu'); 
            }
            
        }
        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if(Auth::id())
        {

            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            return view('home.showcart',compact('cart'));
        }else
        {
            return redirect('login'); 
        }
        
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        
        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order=new order;
            
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;
            $order->payment_status='Plaćanje pri dostavi'; //ovo ispravi   
            $order->delivery_status='Obrada'; //ovo ispravi

            $order->save();
                    
            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','Primili smo vašu narudžbu. Kontaktirat ćemo vas ubrzo...');
    }

    public function show_order()
    {
        if(Auth::id())
        { 
            $user=Auth::user();
            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='Otkazali ste dostavu'; //ovo ispravi
        $order->save();
        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(12);

        return view('home.userpage',compact('product'));
    }

    public function products()
    {
        $product=product::paginate(12);
        
        return view('home.all_products',compact('product'));
    }

    public function search_product(Request $request)
    {
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orWhere('category','LIKE',"%$search_text%")->paginate(12);

        return view('home.all_products',compact('product'));
    }
}
