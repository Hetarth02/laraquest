<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;

class ForumController extends Controller
{
    public function create_forum(Request $request)
    {
        Log::info("Coming into create_forum function");
        //If user is logged in then only create a forum
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login to create a forum.');
        } else {
            $input = $request->all();
            //Validation
            $validator = Validator::make($input, [
                'forum_name' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('/')->with('alert', 'Forum name and Description cannot be empty.');
            } else {
                $forum_name = $input['forum_name'];
                $forum_description = $input['description'];
                $timestamp = new DateTime();
                try {
                    DB::insert('insert into forums (forum_name, forum_description, timestamp) values (?, ?, ?)', [$forum_name, $forum_description, $timestamp]);
                } catch (Exception $error) {
                    return redirect('/')->with('alert', 'Forum already exists or Something went wrong.');
                }
                return redirect('/');
            }
        }
    }

    public function create_thread(Request $request, $id)
    {
        Log::info("Coming into create_thead function");
        //If user is logged in then only create a thread
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login to ask a question.');
        } else {
            $input = $request->all();
            //Validation
            $validator = Validator::make($input, [
                'thread_description' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('alert', 'Question cannot be empty.');
            } else {
                $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$id]);
                $forum_name = $forum_name[0]->forum_name;
                $username = Auth::user()->username;
                $forum_description = $input['thread_description'];
                $timestamp = new DateTime();
                try {
                    DB::insert('insert into threads (forum_id, forum_name, thread_description, username, timestamp) values (?, ?, ?, ?, ?)', [$id, $forum_name, $forum_description, $username, $timestamp]);
                } catch (Exception $error) {
                    return redirect()->back()->with('alert', 'Something went wrong.');
                }
                return redirect()->back();
            }
        }
    }

    public function create_reply(Request $request, $forum_id, $id)
    {
        Log::info("Coming into create_reply function");
        //If user is logged in then only let user reply
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login to reply.');
        } else {
            $input = $request->all();
            //Validation
            $validator = Validator::make($input, [
                'thread_replies' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('alert', 'Thread replies cannot be empty.');
            } else {
                $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
                $forum_name = $forum_name[0]->forum_name;
                $username = Auth::user()->username;
                $thread_replies = $input['thread_replies'];
                $timestamp = new DateTime();
                try {
                    DB::insert('insert into replies (forum_id, thread_id, thread_replies, username, timestamp) values (?, ?, ?, ?, ?)', [$forum_id, $id, $thread_replies, $username, $timestamp]);
                } catch (Exception $error) {
                    return redirect()->back()->with('alert', 'Something went wrong.');
                }
                return redirect()->back();
            }
        }
    }
}
