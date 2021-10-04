<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$forum_name}}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/threadstyle.css') }}" />
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
            @if ($isfiltered == true and $tag == 2)
                @foreach ($thread as $thread)
                <a href="/{{$thread[0]->forum_id}}/{{$thread[0]->thread_id}}">
                    <div class="thread-container">
                        <p>{{$thread[0]->thread_description}}</p>
                        <p>Asked: {{Carbon\Carbon::createFromTimestamp(strtotime($thread[0]->timestamp))->diffForHumans()}}</p>
                        <p><i class="bi bi-person-fill"></i> {{$thread[0]->username}}</p>
                    </div>
                </a>
                @endforeach
            @else
                @foreach ($thread as $thread)
                <a href="/{{$thread->forum_id}}/{{$thread->thread_id}}">
                    <div class="thread-container">
                        <p>{{$thread->thread_description}}</p>
                        <p>Asked: {{Carbon\Carbon::createFromTimestamp(strtotime($thread->timestamp))->diffForHumans()}}</p>
                        <p><i class="bi bi-person-fill"></i> {{$thread->username}}</p>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
        <div class="create-thread">
            <button class="threadbutton" type="button" data-toggle="modal" data-target="#createthread"><i class="bi bi-file-text"></i> Create Thread</button>
            <div class="filter-wrapper">
                <span><i class="bi bi-funnel"></i> Filter by:</span>
                @if ($isfiltered == true)
                    <a href="/forum/{{$forum_id}}"><button><i class="bi bi-question-circle"></i> Unresolved</button></a>
                    <a href="/forum/{{$forum_id}}"><button><i class="bi bi-check-circle"></i> Resolved</button></a>
                    <a href="/forum/{{$forum_id}}"><button><i class="bi bi-exclamation-circle"></i> No Replies</button></a>
                    <a href="/forum/{{$forum_id}}"><i class="bi bi-bootstrap-reboot"></i> Reset filters</a>                    
                @else
                    <a href="../forum/{{$forum_id}}/filter/0"><button><i class="bi bi-question-circle"></i> Unresolved</button></a>
                    <a href="../forum/{{$forum_id}}/filter/1"><button><i class="bi bi-check-circle"></i> Resolved</button></a>
                    <a href="../forum/{{$forum_id}}/filter/2"><button><i class="bi bi-exclamation-circle"></i> No Replies</button></a>
                @endif
            </div>
            <div id="createthread" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div>
                            <form id="threadform" class="threadform" action="../{{$forum_id}}/createthread" method="POST">
                                @csrf
                                <h3>Create a new Thread</h3>
                                <div>
                                    <textarea
                                        id="textarea"
                                        class="description"
                                        name="thread_description"
                                        form="threadform"
                                        rows="5"
                                        cols="30"
                                        wrap="soft"
                                        placeholder="Enter question here..."
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
