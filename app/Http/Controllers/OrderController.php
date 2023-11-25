<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Models\Details;
use App\Models\Car;
use App\Models\Category;
use App\Models\Order;
use App\Models\Client;

class OrderController extends Controller
{


   public function myOrder()
    {
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        return view('orders.orders', compact('orders'));
    }
    public function myOrderCreate()
    {
        $details = Details::all();
        $clients = Client::where('user_id', '=', Auth::user()->id)->get();
         $user_id=Auth::user()->id;
        return view('orders.orders-create', compact('details', 'clients', 'user_id'));
    }
    public function getPrice()
    {
       $art = $_GET['art'];
       $detail_price = Details::where('art', '=', $art)->first();
       return $detail_price->price;
    }
    
     public function myOrderAdd(Request $request)
    {
         $errors="";
         Order::create($request->all());  
         $orders = Order::where('user_id', '=', Auth::user()->id)->get();
         return redirect(route('page-order'))->with( ['orders'=>$orders, 'errors'=>$errors] );   
    }
    
    public function myOrderDelete(Request $request, $id)
    {
       $errors="";
        $order = Order::where('id',$id)->delete();
        $orders = Order::where('user_id', '=', Auth::user()->id)->get();
        return redirect(route('page-order'))->with( ['orders'=>$orders, 'errors'=>$errors] );
    }



}

