<?php

namespace App\Http\Controllers;

use App\Models\ComplaintModel;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    //
    function complaint(){
        $data = ComplaintModel::get();
        return view('backend.complain',compact('data'));
    }
    function addcontact(Request $request){
        $cus = New ComplaintModel();
        $cus->name =$request['name'];
        $cus->email =$request['email'];
        $cus->phone =$request['phone'];
        $cus->msg =$request['msg'];
        $cus->save();
        return redirect('/contact');
    }
}
