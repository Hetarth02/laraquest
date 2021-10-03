<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    public function profile()
    {
        if (empty(Auth::user()->username)) {
            return redirect('/login');
        } else {
            $username = Auth::user()->username;
            $data = DB::select('select name, email, username, password_values, user_subs from users where username = ?', [$username]);
            $thread = json_decode($data[0]->user_subs, true);
            if (empty($thread)) {
                return view('profile')->with('data', $data)->with('thread_data', false);
            } else {
                $thread_data = [];
                foreach ($thread as $thread) {
                    array_push($thread_data, DB::select('select * from threads where thread_id = ?', [$thread]));
                }
                return view('profile')->with('data', $data)->with('thread_data', $thread_data);
            }
        }
    }

    public function user_profile($username)
    {
        if ($username == (Auth::user()->username)) {
            return redirect('/profile');
        }
        $user_data = DB::select('select * from users where username = ?', [$username]);
        return view('userprofile')->with('user_data', $user_data);
    }

    public function bookmark(Request $request, $forum_id, $thread_id)
    {
        //If user is logged in then only add as bookmark
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login to Bookmark.');
        } else {
            $username = Auth::user()->username;
            $user_subs = DB::select('select user_subs from users where username = ?', [$username]);
            $user_subs = json_decode($user_subs[0]->user_subs, true);
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
            $user_subs = json_decode($user_subs[0]->user_subs, true);
            $key = array_search((int)$thread_id, $user_subs);
            if (!empty($key)) {
                unset($user_subs[$key]);
            }
            $user_subs = array_values($user_subs);
            if (count($user_subs) == 1) {
                $user_subs = [];
            }
            if (empty($user_subs)) {
                try {
                    DB::insert('update users set user_subs = "[]" where username = ?', [$username]);
                } catch (Exception $error) {
                    return redirect()->back()->with('alert', 'Something went wrong.');
                }
                return redirect()->back();
            } else {
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
}
