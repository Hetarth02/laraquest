<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeScreenController extends Controller
{
    public function displayhomescreen()
    {
        $forum = DB::select('select * from forums order by timestamp desc');
        return view('home')->with('forum', $forum);
    }

    public function threadview($id)
    {
        $thread = DB::select('select * from threads where forum_id = ? order by timestamp desc', [$id]);
        $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$id]);
        return view('thread')->with('thread', $thread)->with('forum_id', $id)->with('forum_name', $forum_name[0]->forum_name)->with('isfiltered', false);
    }

    public function filter($id, $tag)
    {
        $thread = DB::select('select * from threads where forum_id = ? and tag = ? order by timestamp desc', [$id, $tag]);
        $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$id]);
        return view('thread')->with('thread', $thread)->with('forum_id', $id)->with('forum_name', $forum_name[0]->forum_name)->with('isfiltered', true);
    }

    public function qaview($forum_id, $thread_id)
    {
        if (empty(Auth::user()->username)) {
            $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
            $thread = DB::select('select thread_id, username, thread_description, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
            $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp desc', [$thread_id]);
            return view('qaview')->with('forum_name', $forum_name[0]->forum_name)->with('thread', $thread)->with('replies', $replies)->with('thread_id', $thread_id)->with('forum_id', $forum_id)->with('sort', false)->with('bookmarked', false);
        } else {
            $username = Auth::user()->username;
            $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
            $thread = DB::select('select thread_id, username, thread_description, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
            $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp desc', [$thread_id]);
            $user_subs = DB::select('select user_subs from users where username = ?', [$username]);
            $user_subs = $user_subs[0]->user_subs;
            $user_subs = json_decode($user_subs, true);
            if (in_array($thread_id, $user_subs)) {
                return view('qaview')->with('forum_name', $forum_name[0]->forum_name)->with('thread', $thread)->with('replies', $replies)->with('thread_id', $thread_id)->with('forum_id', $forum_id)->with('sort', false)->with('bookmarked', true);
            } else {
                return view('qaview')->with('forum_name', $forum_name[0]->forum_name)->with('thread', $thread)->with('replies', $replies)->with('thread_id', $thread_id)->with('forum_id', $forum_id)->with('sort', false)->with('bookmarked', false);
            }
        }
    }

    public function sort($forum_id, $thread_id)
    {
        $forum_name = DB::select('select forum_name from forums where forum_id = ?', [$forum_id]);
        $thread = DB::select('select username, thread_description, timestamp from threads where forum_id = ? and thread_id = ?', [$forum_id, $thread_id]);
        $replies = DB::select('select thread_replies, username, timestamp from replies where thread_id = ? order by timestamp asc', [$thread_id]);
        return view('qaview')->with('forum_name', $forum_name[0]->forum_name)->with('thread', $thread)->with('replies', $replies)->with('thread_id', $thread_id)->with('forum_id', $forum_id)->with('sort', true)->with('bookmarked', false);
    }
}
