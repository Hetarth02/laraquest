<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        return view('thread')->with('thread', $thread);
    }
}
