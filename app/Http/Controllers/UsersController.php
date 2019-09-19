<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePassword;
use Illuminate\Support\Facades\Auth;

use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * change user password
     */
    public function changePassword(ChangePassword $request)
    {
        if($request->isMethod('get')){
            return view('settings');
        }else if($request->isMethod('post')){

            // change user password
            User::changePassword(Auth::user()->email, $request->pass);

            return redirect()->route('home');
        }
    }
}
