<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$forum_name}}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/qaviewstyle.css') }}" />
</head>
<body>
    <nav class="navbar sticky-top navbar-dark menu">
        <a class="navbar-brand" href="/"><i class="fas fa-paper-plane logo-size"></i> Laraquest</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/"><i class="bi bi-files"></i> Forums</a></li>
                <li class="nav-item"><a class="nav-link" href="/profile"><i class="bi bi-people-fill"></i> Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="/about"><i class="bi bi-info-circle"></i> About</a></li>
                @if (empty(Auth::user()->username))
                    <li class="nav-item"><a class="nav-link" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="row-container">
        <div class="flexbox-wrapper">
            @foreach ($thread as $thread)
                <div class="thread-container">
                    <p>{{$thread->thread_description}}</p>
                    <p>Asked: {{Carbon\Carbon::createFromTimestamp(strtotime($thread->timestamp))->diffForHumans()}}</p>
                    @if ($bookmarked == true)
                        <a href="/{{$forum_name}}/remove_bookmark/{{$thread->thread_id}}"><button class="reply"><i class="bi bi-bookmark-heart-fill"></i></button></a>
                    @else
                        <a href="/{{$forum_name}}/bookmark/{{$thread->thread_id}}"><button class="reply"><i class="bi bi-bookmark"></i></button></a>
                    @endif
                    <p><a href="profile/{{$thread->username}}"><i class="bi bi-person-fill"></i> {{$thread->username}}</a></p>
                    <button class="reply" type="button" data-toggle="modal" data-target="#createreply"><i class="bi bi-reply-fill"></i> Reply</button>
                </div>
            @endforeach
            <h3>Answers</h3>
            @foreach ($replies as $replies)
                <div class="thread-container">
                    <p>{{$replies->thread_replies}}</p>
                    <p>Posted: {{Carbon\Carbon::createFromTimestamp(strtotime($replies->timestamp))->diffForHumans()}}</p>
                    <p><a href="profile/{{$replies->username}}"><i class="bi bi-person-fill"></i> {{$replies->username}}</a></p>
                    <button class="reply" type="button" data-toggle="modal" data-target="#createreply"><i class="bi bi-reply-fill"></i> Reply</button>
                </div>
            @endforeach
        </div>
        <div class="create-thread">
            <div class="filter-wrapper">
                <span><i class="bi bi-calendar4-range"></i> Date Added:</span>
                @if ($sort == true)
                    <a href="/{{$forum_id}}/{{$thread_id}}"><button><i class="bi bi-calendar3-week"></i> Latest</button></a>
                    <a href="/{{$forum_id}}/{{$thread_id}}/sort"><button><i class="bi bi-calendar3"></i> Earliest</button></a>
                    <a href="/{{$forum_id}}/{{$thread_id}}"><i class="bi bi-bootstrap-reboot"></i> Reset filters</a>
                @else
                    <a href="/{{$forum_id}}/{{$thread_id}}"><button><i class="bi bi-calendar3-week"></i> Latest</button></a>
                    <a href="/{{$forum_id}}/{{$thread_id}}/sort"><button><i class="bi bi-calendar3"></i> Earliest</button></a>
                @endif
            </div>
            <div id="createreply" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div>
                            <form id="replyform" class="threadform" action="../{{$thread_id}}/createreply" method="POST">
                                @csrf
                                <h3>Add a new Reply</h3>
                                <div>
                                    <textarea
                                        id="textarea"
                                        class="description"
                                        name="thread_replies"
                                        form="replyform"
                                        rows="5"
                                        cols="30"
                                        wrap="soft"
                                        placeholder="Enter your reply here..."
                                    ></textarea>
                                </div>
                                <button type="submit">Create</button>
                                <button type="button" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
