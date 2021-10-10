<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeScreenController extends Controller
{
    public function display_home_screen()
    {
        Log::info("Coming into display_home_screen function");
        $forum = DB::select('select * from forums order by timestamp desc');
        return view('home')->with('forum', $forum);
    }

    public function thread_view($id)
    {
        Log::info("Coming into thread_view function");
        $thread = DB::select('select * from threads where forum_id = ? order by timestamp desc', [$id]);
        $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$id]);
        return view('thread')->with('thread', $thread)
            ->with('forum_id', $id)
            ->with('forum_name', $forum_name[0]->forum_name)
            ->with('isfiltered', false);
    }

    public function filter($id, $tag)
    {
        Log::info("Coming into filter function");
        $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$id]);

        //Checking which filter is applied
        if ($tag == 2) {
            //Making an array of threads which do not have replies
            $replied_thread = DB::select('select thread_id from replies where forum_id = ?', [$id]);
            $replied_thread_array = [];
            for ($i=0; $i < count($replied_thread); $i++) { 
                array_push($replied_thread_array, $replied_thread[$i]->thread_id);
            }

            //Making an array of existing threads
            $all_thread = DB::select('select thread_id from threads where forum_id = ?', [$id]);
            $all_thread_array = [];
            for ($i=0; $i < count($all_thread); $i++) { 
                array_push($all_thread_array, $all_thread[$i]->thread_id);
            }

            //Removing threads with replies
            $array = array_diff($all_thread_array, $replied_thread_array);
            $array = array_values($array);
            if (empty($array)) {
                //If there exists no empty threads
                return view('thread')->with('thread', $array)
                    ->with('forum_id', $id)
                    ->with('forum_name', $forum_name[0]->forum_name)
                    ->with('isfiltered', true)
                    ->with('tag', $tag);
            } else {
                //Fetching data of threads with no replies
                $thread_data = [];
                foreach ($array as $thread) {
                    array_push($thread_data, DB::select('select * from threads where thread_id = ?', [$thread]));
                }
                return view('thread')->with('thread', $thread_data)
                    ->with('forum_id', $id)
                    ->with('forum_name', $forum_name[0]->forum_name)
                    ->with('isfiltered', true)
                    ->with('tag', $tag);
            }
        } else {
            if ($tag == 1) {
                $thread = DB::select('select * from threads where forum_id = ? and tag = ? order by timestamp desc', [$id, $tag]);
                return view('thread')->with('thread', $thread)
                    ->with('forum_id', $id)
                    ->with('forum_name', $forum_name[0]->forum_name)
                    ->with('isfiltered', true)
                    ->with('tag', $tag);
            }
            $thread = DB::select('select * from threads where forum_id = ? and tag = ? order by timestamp desc', [$id, $tag]);
            return view('thread')->with('thread', $thread)
                ->with('forum_id', $id)
                ->with('forum_name', $forum_name[0]->forum_name)
                ->with('isfiltered', true)
                ->with('tag', $tag);
        }
    }

    public function qaview($forum_id, $thread_id)
    {
        Log::info("Coming into qaview function");
        //Checking if user is logged in or not
        if (empty(Auth::user()->username)) {
            $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
            $thread = DB::select('select thread_id, username, thread_description, tag, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
            $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp desc', [$thread_id]);
            
            //Returning view with data
            return view('qaview')->with('forum_name', $forum_name[0]->forum_name)
                ->with('thread', $thread)
                ->with('replies', $replies)
                ->with('thread_id', $thread_id)
                ->with('forum_id', $forum_id)
                ->with('sort', false)
                ->with('bookmarked', false);
        } else {
            $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
            $thread = DB::select('select thread_id, username, thread_description, tag, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
            $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp desc', [$thread_id]);
            
            //Checking if it is bookmarked by user or not
            $username = Auth::user()->username;
            $user_subs = DB::select('select user_subs from users where username = ?', [$username]);
            $user_subs = $user_subs[0]->user_subs;
            $user_subs = json_decode($user_subs, true);
            if (in_array($thread_id, $user_subs)) {
                return view('qaview')->with('forum_name', $forum_name[0]->forum_name)
                    ->with('thread', $thread)
                    ->with('replies', $replies)
                    ->with('thread_id', $thread_id)
                    ->with('forum_id', $forum_id)
                    ->with('sort', false)
                    ->with('bookmarked', true);
            } else {
                return view('qaview')->with('forum_name', $forum_name[0]->forum_name)
                ->with('thread', $thread)
                ->with('replies', $replies)
                ->with('thread_id', $thread_id)
                ->with('forum_id', $forum_id)
                ->with('sort', false)
                ->with('bookmarked', false);
            }
        }
    }

    public function sort($forum_id, $thread_id)
    {
        Log::info("Coming into sort function");
        //Checking if user is logged in or not
        if (empty(Auth::user()->username)) {
            $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
            $thread = DB::select('select thread_id, username, thread_description, tag, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
            $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp asc', [$thread_id]);
            
            //Returning view with data
            return view('qaview')->with('forum_name', $forum_name[0]->forum_name)
                ->with('thread', $thread)
                ->with('replies', $replies)
                ->with('thread_id', $thread_id)
                ->with('forum_id', $forum_id)
                ->with('sort', true)
                ->with('bookmarked', false);
        } else {
            $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
            $thread = DB::select('select thread_id, username, thread_description, tag, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
            $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp asc', [$thread_id]);
            
            //Checking if it is bookmarked by user or not
            $username = Auth::user()->username;
            $user_subs = DB::select('select user_subs from users where username = ?', [$username]);
            $user_subs = $user_subs[0]->user_subs;
            $user_subs = json_decode($user_subs, true);
            if (in_array($thread_id, $user_subs)) {
                return view('qaview')->with('forum_name', $forum_name[0]->forum_name)
                    ->with('thread', $thread)
                    ->with('replies', $replies)
                    ->with('thread_id', $thread_id)
                    ->with('forum_id', $forum_id)
                    ->with('sort', true)
                    ->with('bookmarked', true);
            } else {
                return view('qaview')->with('forum_name', $forum_name[0]->forum_name)
                    ->with('thread', $thread)
                    ->with('replies', $replies)
                    ->with('thread_id', $thread_id)
                    ->with('forum_id', $forum_id)
                    ->with('sort', true)
                    ->with('bookmarked', false);
            }
        }
    }
}
