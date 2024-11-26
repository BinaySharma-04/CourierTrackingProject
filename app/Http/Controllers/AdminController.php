<?php

namespace App\Http\Controllers;

use App\Models\ComplaintModel;
use App\Models\Courier;
use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{
  // function admin(){
  //   return view("backend.admin");
  // }
  function complain(){
    return view("backend.complain");
  }
  function courier(){
    $data = Courier::get();

    return view("backend.courier",compact('data'));
  }
  function customer(){
    return view("backend.customer");
  }
  function staff(){
    $data = StaffModel::get();
    return view("backend.staff",compact('data'));
  }


  function addcourier(Request $request){
 $c = New Courier();
 $c->name =$request["name"]; 
 $c->address =$request["address"]; 
 $c->destination =$request["destination"]; 
 $c->r_name =$request["r_name"]; 
 $c->r_email =$request["r_email"]; 
 $c->r_phone =$request["r_phone"]; 
 $c->r_address =$request["r_address"]; 
 $c->order_id =$request["order_id"]; 
 $c->weight =$request["weight"]; 
 $c->dimension =$request["dimension"]; 
 $c->package =$request["package"]; 
 $c->message =$request["message"]; 
 $c->save();
 return redirect("courier");


}
  function addstaff(Request $request){
$staff = New StaffModel();
$staff->name =$request["name"]; 
$staff->address =$request["address"]; 
$staff->email =$request["email"]; 
$staff->phone_num =$request["phone"]; 
$staff->save();
return redirect("staff");
}
  function addcontact(Request $request){
$staff = New ComplaintModel();
$staff->name =$request["name"]; 
$staff->email =$request["email"]; 
$staff->phone =$request["phone"]; 
$staff->msg =$request["msg"]; 
$staff->save();
return redirect("contact");
}
public function showLogin()
{
    return view('admin.login'); // Create an admin login view
}

// Handle admin login
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('admin')->with('message', 'Welcome to Admin Dashboard!');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput();
}

// Show admin dashboard
function admin(){
  $tc = Courier::count('name');
  $tcus = StaffModel::count('id');
  $Tpick = Courier::where('status', 'Order Pickup')->count();
  $transsit = Courier::where('status', 'In Transit')->count();
  $delever = Courier::where('status', 'Delivered')->count();
  $tstaff = StaffModel::count('id');
  $tcom = ComplaintModel::count('id');
  
  
  return view('backend.admin', compact('tc', 'tcus', 'Tpick', 'transsit', 'delever', 'tstaff', 'tcom'));
}  
}
