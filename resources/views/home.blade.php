<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forums</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/homestyle.css') }}" />
</head>
<body>
    <nav class="navbar sticky-top navbar-dark menu">
        <a class="navbar-brand" href="/">
            <i class="fas fa-paper-plane logo-size"></i> Laraquest
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="bi bi-files"></i> Forums
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">
                        <i class="bi bi-people-fill"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">
                        <i class="bi bi-info-circle"></i> About
                    </a>
                </li>

                @if (empty(Auth::user()->username))
                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            <i class="bi bi-box-arrow-right"></i> Login
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </nav>

    <div class="row-container">

        <div class="flexbox-wrapper">

            @foreach ($forum as $forum)
                <a href="/forum/{{$forum->forum_id}}">
                    <div class="forum-container">
                        <h3>{{$forum->forum_name}}</h3>
                        <br>
                        <p>{{$forum->forum_description}}</p>
                    </div>
                </a>
            @endforeach

        </div>

        <div class="create-forum">

            <button class="forumbutton" type="button" data-toggle="modal" data-target="#createforum">
                <i class="bi bi-files"></i> Create Forum
            </button>

            <div id="createforum" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div>
                            
                            <form id="forumform" class="forumform" action="/createforum" method="POST">
                                @csrf
                                <h3>Create a Forum</h3>

                                <div>
                                    <input class="forumtext"
                                        name="forum_name"
                                        placeholder="Forum Title"
                                        type="text"
                                    />
                                    
                                    <textarea
                                        id="textarea"
                                        class="description"
                                        name="description"
                                        form="forumform"
                                        rows="4"
                                        cols="20"
                                        wrap="soft"
                                        placeholder="Provide a short description..."
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
