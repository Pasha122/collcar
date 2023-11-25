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

class ClientController extends Controller
{
    public function myClients()
    {
        $errors="";
        $clients = Client::where('user_id', '=', Auth::user()->id)->get();
        return view('clients.clients', compact('clients', 'errors'));
    }
    public function myClientCreate()
    {
        $user_id=Auth::user()->id;
        return view('clients.clients-create', compact('user_id'));
    }

    public function myClientAdd(Request $request)
    {
        $errors="";
        if(Client::where('email', $request->email)->exists()){
            $clients = Client::where('user_id', '=', Auth::user()->id)->get();
            $errors='Користувач з таким Email вже існує!';
            return view('clients.clients', compact('clients', 'errors'));
        }else{
            Client::create($request->all());  
            $clients = Client::where('user_id', '=', Auth::user()->id)->get();
            return redirect(route('page-client'))->with( ['clients'=>$clients, 'errors'=>$errors] );
        }

             
    }

    public function myClientEdit(Request $request, $id)
    {
        $clients = Client::where('id', '=', $id)->get();
        $user_id=Auth::user()->id;
        return view('clients.edit-clients', compact('clients', 'user_id'));
    } 
    public function myClientUpdate(Request $request, $id)
    {
      
        $errors="";
        if(Client::where('email', $request->email)->exists()){
            $clients = Client::where('user_id', '=', Auth::user()->id)->get();
            $errors="Користувач з таким Email вже існує!";
            return view('clients.clients', compact('clients', 'errors'));
        }else{
            $client = Client::find($id);
            $client->update($request->all());
            $clients = Client::where('id', '=', $id)->get();
            return redirect(route('page-client'))->with( ['clients'=>$clients, 'errors'=>$errors] );
        }






    }

    public function myClientDelete(Request $request, $id)
    {
        $client = Client::where('id',$id)->delete();
        $clients = Client::where('id', '=', $id)->get();
        return redirect(route('page-client'))->with( ['clients'=>$clients] ); 
    }
}
