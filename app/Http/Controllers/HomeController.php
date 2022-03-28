<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use App\Models\Pedido;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Provider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
 {
     $users = User::all();
     $pedidos = Pedido::all();
     $products = Product::all();
     $roles= Role::all();
     
     $providers = Provider::all();
     

     return view('index', compact('users','pedidos','products','roles','providers'));

 }
}
