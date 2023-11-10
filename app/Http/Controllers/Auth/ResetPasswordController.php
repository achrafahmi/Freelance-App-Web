<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\freelancer;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */


     public function changePassword(Request $request)
     {
         $validator = $request->validate([
             'password' => 'required',
             'newpassword' => 'required|min:8',
             'renewpassword' => 'required|same:newpassword',
             'idFreelancer' => 'required|numeric',
         ]);
     
         $user = Auth::user();
         $freelancer = Freelancer::find($request->idFreelancer);
     
         if (Hash::check($request->password, $user->password)) {
             if (Hash::check($request->password, $freelancer->password)) {
                 $user->password = Hash::make($request->newpassword);
                 $user->save();
     
                 // Update freelancer password as well
                 $freelancer->password = Hash::make($request->newpassword);
                 $freelancer->save();
     
                 session()->flash('success', 'Password updated successfully.');
             } else {
                 session()->flash('error', 'Current freelancer password is incorrect.');
             }
         } else {
             session()->flash('error', 'Current user password is incorrect.');
         }
     
         return redirect()->back();
     }
     


     




    protected $redirectTo = RouteServiceProvider::HOME;
}
