<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\ComplaintModel;
use App\Models\CustomerModel;
use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
class StaffController extends Controller
{
    //
    function staff(){
        $data = StaffModel::get();
        return view('backend.staff',compact('data'));
    }
    function customer(){
        $data = CustomerModel::get();
 
        return view('backend.customer',compact('data'));
    }

    function addstaff(Request $request){
        $cus = New StaffModel();
        $cus->name =$request['name'];
        $cus->address =$request['address'];
        $cus->email =$request['email'];
        $cus->password =$request['password'];
        $cus->phone_num =$request['phone'];
        $cus->save();
        return redirect('/staff');
    }
    public function createStaff(Request $request)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:staffs',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Create the staff member with hashed password
    StaffModel::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Hashing the password
    ]);

    return redirect()->route('backend.admin'); // Redirect as needed
}

    function deletestaff($id) {
        $c = StaffModel::find($id);
        
         if ($c) {
            $c->delete();
        }
    
        return redirect()->back();
    }
    function deletecom($id) {
        $c = ComplaintModel::find($id);
        
         if ($c) {
            $c->delete();
        }
    
        return redirect()->back();
    }
    function staffedit($id){
        $c = StaffModel::where('id',$id)->first();
        return view('backend.staffedit',compact('c'));
    
    }
    function editstaff($id, Request $request){
        $c = StaffModel::find($id);
        $c->name =$request['name'];
        $c->address =$request['address'];
        $c->email =$request['email'];
        $c->password = Hash::make($request->password);
        $c->phone_num =$request['phone'];
        $c->save();
        return redirect('/staff');
        
    }

}

// id	name	address	destination	r_name	r_email	r_phone	r_address	order_id	weight	dimension	package	message	