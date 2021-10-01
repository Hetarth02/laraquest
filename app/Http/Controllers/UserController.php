<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

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

    public function bookmark(Request $request, $forum_id, $thread_id)
    {
        //If user is logged in then only add as bookmark
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login to Bookmark.');
        } else {
            $username = Auth::user()->username;
            $user_subs = DB::select('select user_subs from users where username = ?', [$username]);
            $user_subs = $user_subs[0]->user_subs;
            $user_subs = json_decode($user_subs, true);
            array_push($user_subs, (int)$thread_id);
            $user_subs = array_unique($user_subs);
            $subs = json_encode($user_subs);
            try {
                DB::insert('update users set user_subs = ? where username = ?', [$subs, $username]);
            } catch (Exception $error) {
                return redirect()->back()->with('alert', 'Something went wrong.');
            }
            return redirect()->back();
        }
    }

    public function remove_bookmark(Request $request, $forum_id, $thread_id)
    {
        //If user is logged in then only remove bookmark
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login');
        } else {
            $username = Auth::user()->username;
            $user_subs = DB::select('select user_subs from users where username = ?', [$username]);
            $user_subs = $user_subs[0]->user_subs;
            $user_subs = json_decode($user_subs, true);
            $key = array_search((int)$thread_id, $user_subs);
            if (!empty($key)) {
                unset($user_subs[$key]);
            }
            $user_subs = array_values($user_subs);
            $subs = json_encode($user_subs);
            try {
                DB::insert('update users set user_subs = ? where username = ?', [$subs, $username]);
            } catch (Exception $error) {
                return redirect()->back()->with('alert', 'Something went wrong.');
            }
            return redirect()->back();
        }
    }
}
