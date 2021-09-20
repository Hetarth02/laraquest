<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user_profile(Request $request)
    {
        if (empty(Auth::user()->username)) {
            return redirect('/login');
        } else {
            $username = Auth::user()->username;
            $user_data = DB::select('select * from users where username = ?', [$username]);
            return view('profile')->with('user_data', $user_data);
        }
        
    }
}
