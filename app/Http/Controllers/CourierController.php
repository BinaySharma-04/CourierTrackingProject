<?php

namespace App\Http\Controllers;
use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function courier() {
        $data = Courier::get();
         return view('backend.courier',compact('data'));
    }

    public function track($orderId)
    {
        $courier = Courier::where('order_id', $orderId)->first();
        if (!$courier) {
            // If no record is found, return a view with an error message
            return view('track')->with('error', 'Order not found.');
        }
    
        return view('track', compact('courier'));
    }

    public function updateStatus(Request $request, $id)
    {
        $courier = Courier::find($id);
        $courier->status = $request->status;
        $courier->save();

        return redirect()->route('track', $courier->order_id);
    }

function addcourier(Request $request){
    $cus = New Courier();
    $cus->name =$request['name'];
    $cus->address =$request['address'];
    $cus->destination =$request['destination'];
    $cus->r_name =$request['r_name'];
    $cus->r_email =$request['r_email'];

    $cus->r_phone =$request['r_phone'];
    $cus->r_address =$request['r_address'];
    $cus->status =$request['status'];
    $cus->order_id =$request['order_id'];
    $cus->weight =$request['weight'];
    $cus->dimension =$request['dimension'];
    $cus->package =$request['package'];
    $cus->message =$request['msg'];
    $cus->save();
    return redirect('/courier');

    
}
public function trackShipment(Request $request)
{
    
      $orderId = $request->input('order_id');
     

    // Search for the order_id in the database
    $courier = Courier::where('order_id', $orderId)->first();

    if ($courier) {
        // If the order is found, pass the courier data to trackingResult view
        return view('frontend.trackingResult', compact('courier'));
    } else {
        // If the order is not found, redirect back with an error message
        return redirect()->back()->with('error', 'Tracking number not found.');
    }
}


// name	address	destination	r_name	r_email	r_phone	r_address	order_id	weight	dimension	package	message	


function deletecourier($order_id) {
    $c = Courier::find($order_id);
    
     if ($c) {
        $c->delete();
    }

    return redirect()->back();
}
function courieredit($id){
    $c = Courier::where('id',$id)->first();
    return view('backend.courieredit',compact('c'));

}
function editcourier($id, Request $request){
    $c = Courier::find($id);
    $c->name =$request['name'];
    $c->address =$request['address'];
    $c->destination =$request['destination'];
    $c->r_name =$request['r_name'];
    $c->r_email =$request['r_email'];
     $c->r_phone =$request['r_phone'];
    $c->r_address =$request['r_address'];
    $c->status =$request['status'];
    $c->order_id =$request['order_id'];
    $c->weight =$request['weight'];
    $c->dimension =$request['dimension'];
    $c->package =$request['package'];
    $c->message =$request['msg'];
    $c->save();
    return redirect('/courier');
    
}
}
