<?php

namespace App\Http\Controllers;

use App\Models\ComplaintModel;
use App\Models\Courier;
use App\Models\CustomerModel;
use App\Models\StaffModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function admin() {
        $tc = Courier::count('name');
        $tcus = CustomerModel::count('id');
        $tcom = Courier::where('status', 'Order Confirm')->count();
        $Tpick = Courier::where('status', 'Order Pickup')->count();
        $transsit = Courier::where('status', 'In Transit')->count();
        $delever = Courier::where('status', 'Delivered')->count();
        $tstaff = StaffModel::count('id');
        $tcom = ComplaintModel::count('id');
    
        return view('backend.admin', compact('tc', 'tcus','tcom', 'Tpick', 'transsit', 'delever', 'tstaff', 'tcom'));
    }
    
}
