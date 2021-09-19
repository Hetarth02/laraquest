<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Exception;

class LoginController extends Controller
{
    public function user_register(Request $request)
    {
        $input = $request->all();

        //Validation
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alert', 'Only whitespaces in any field are not allowed.');
        } else {
            $name = $input['name'];
            $email = $input['email'];
            $username = $input['username'];
            $password_value = $input['password'];
            $password = bcrypt($password_value);

            try {
                //Insert in DB if everything is valid and redirect to login page
                DB::insert('insert into users (name,email,username,password,password_values) values (?,?,?,?,?)', [$name,$email,$username,$password,$password_value]);
                return redirect('/login');
            } catch (Exception $error) {
                return redirect()->back()->with('alert', 'Something went wrong, Please try again.');
            }
        }
    }

    public function user_login(Request $request)
    {
        $input = $request->all();

        //Validation
        $validator = Validator::make($input, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alert', 'Only whitespaces as username or password are not allowed.');
        } else {
            $username = $input['username'];
            $password = $input['password'];

            //Authenciating
            $data = array(
                'username' => $username,
                'password' => $password
            );
            if (Auth::attempt($data)) {
                //Generating unique user session
                $request->session()->regenerate();
                return response('Logged in!');
                //return redirect('/home');
            } else {
                return redirect('/login')->with('alert', 'User not found');
            }
        }
    }

    public function user_logout(Request $request)
    {
        //Deleting user session and all its data
        Session::flush();
        Auth::logout();
        return response('Logged out!');
        //return redirect('/home');
    }
}
