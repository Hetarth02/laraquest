<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class ForumController extends Controller
{
    public function createforum(Request $request)
    {
        //If user is logged in then only create a forum
        if (empty(Auth::user()->username)) {
            return redirect('/login')->with('alert', 'Please login to create a forum.');
        } else {
            $input = $request->all();
            //Validation
            $validator = Validator::make($input, [
                'dropdown' => 'required',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('/')->with('alert', 'Forum name and Description cannot be empty.');
            } else {
                $forum_name = $input['dropdown'];
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
}
