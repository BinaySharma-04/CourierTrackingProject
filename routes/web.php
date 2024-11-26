<?php
use App\Http\Controllers\AuthController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
Route::get('/login', [AuthController::class, 'login'])->name("login");
Route::post('/login', [AuthController::class, "loginPost"])->name("loginpost");

Route::get('/register', [AuthController::class, 'register'])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("registerPost");

Route::get('/', function () {
    return view('frontend.index');
})->name("index");

Route::get('/about', function () { return view('frontend.aboutUs'); });
Route::get('/services', function () { return view('frontend.services'); });
Route::get('/tracking', function () { return view('frontend.tracking'); });
Route::get('/trackingResult', function () { return view('frontend.trackingResult'); });
Route::get('/contact', function () { return view('frontend.contactUS'); });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});
Route::get('/dashboard', function () { return view('backend.dashboard'); });

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('index');
})->name('logout');

// require __DIR__.'/auth.php';?
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;

Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminAuthController::class,'login']);
Route::get('/admin', [AdminController::class,'admin']);
// Route::post('/admin', function () {
//     return view('backend.admin'); 
// });


Route::get('/staff', [StaffController::class, 'staff']);
Route::post('/addstaff', [StaffController::class, 'addstaff']);
Route::post('/addcourier', [CourierController::class, 'addcourier']);
Route::post('/addcontact', [ComplaintController::class, 'addcontact']);
Route::get('/courier', [CourierController::class, 'courier']);
Route::get('/customer', [StaffController::class, 'customer']);
Route::get('/complain', [ComplaintController::class, 'complaint']);


Route::post('/track-shipment', [CourierController::class, 'trackShipment'])->name('track.shipment');
Route::get('/courieredit/{id}', [CourierController::class, 'courieredit']);
Route::post('/editcourier/{id}', [CourierController::class, 'editcourier']);
Route::get('/deletecourier/{id}', [CourierController::class, 'deletecourier']);

Route::get('/staffedit/{id}', [StaffController::class, 'staffedit']);
Route::post('/editstaff/{id}', [StaffController::class, 'editstaff']);
Route::get('/deletestaff/{id}', [StaffController::class, 'deletestaff']);
Route::get('/deletecom/{id}', [StaffController::class, 'deletecom']);

use App\Http\Controllers\TrackingController;
use App\Models\StaffModel;

Route::get('/api/tracking-status/{order_id}', [TrackingController::class, 'getTrackingStatus']);

Route::view("/adminlogin","backend.adminlogin");

 
 
Route::get('/rehash-passwords', function () {
    $staffMembers = StaffModel::all();

    foreach ($staffMembers as $staff) {
        // Check if the password needs to be rehashed
        if (Hash::needsRehash($staff->password)) {
            // Update the password with the same value to rehash it
            // Note: You should replace this logic to get the current password if needed
            $staff->password = Hash::make('newDefaultPassword'); // This should be a prompt for a new password
            $staff->save();
        }
    }

    return 'Password rehashing completed!';
});