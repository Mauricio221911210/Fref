<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index ()
 {
     $providers = Provider::orderBy('id', 'desc')->paginate(10);

     return view('providers.index', compact('providers'));
 }

 public function store(Request $request)
 {

    $request->validate([
        'name' => 'required',
        'contact' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'status' => 'required',
    ]);
     
     Provider::create([
         'name' => $request->name,
         'contact' => $request->contact,
         'phone' => $request->phone,
         'address' => $request->address,
         'status' => $request->status,
     ]);
     return back()->with('info', 'El Proveedor se creo con exito');
 }

 public function edit (Provider $provider)
 {
     return view('providers.edit', compact('provider'));
 }
 
 public function update(Request $request, Provider $provider)
 {

    $request->validate([
        'name' => 'required',
        'contact' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'status' => 'required',
    ]);
     
     $provider->update($request->all());
     return redirect()->route('provider.index')->with('info', 'El proveedor se actualizo con exito');


 }

 public function destroy(Provider $provider)
 {
     $provider->delete();
     return back()->with('info', 'El Proveedor se elimino con exito ');
 }
}
