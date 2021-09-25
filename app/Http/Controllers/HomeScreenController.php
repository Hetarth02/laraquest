<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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
}
