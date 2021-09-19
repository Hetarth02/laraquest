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
        <a class="navbar-brand" href="home">Laraquest</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="/home">Forums</a></li>
                <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="row-container">
        <div class="flexbox-wrapper">
            <div class="forum-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquam quis, pariatur voluptatibus itaque sapiente exercitationem est, similique asperiores quisquam consequuntur ipsum dolorem odit. Fugit molestiae culpa quod repellat vitae.</div>
            <div class="forum-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquam quis, pariatur voluptatibus itaque sapiente exercitationem est, similique asperiores quisquam consequuntur ipsum dolorem odit. Fugit molestiae culpa quod repellat vitae.</div>
            <div class="forum-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquam quis, pariatur voluptatibus itaque sapiente exercitationem est, similique asperiores quisquam consequuntur ipsum dolorem odit. Fugit molestiae culpa quod repellat vitae.</div>
            <div class="forum-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquam quis, pariatur voluptatibus itaque sapiente exercitationem est, similique asperiores quisquam consequuntur ipsum dolorem odit. Fugit molestiae culpa quod repellat vitae.</div>
            <div class="forum-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquam quis, pariatur voluptatibus itaque sapiente exercitationem est, similique asperiores quisquam consequuntur ipsum dolorem odit. Fugit molestiae culpa quod repellat vitae.</div>
            <div class="forum-container">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquam quis, pariatur voluptatibus itaque sapiente exercitationem est, similique asperiores quisquam consequuntur ipsum dolorem odit. Fugit molestiae culpa quod repellat vitae.</div>
        </div>
        <div class="create-forum">
            <button class="forumbutton" type="button" data-toggle="modal" data-target="#createforum">+ Create Forum</button>
            <div id="createforum" class="modal fade">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div>
                            <form id="forumform" class="forumform" action="createforum" method="POST">
                                @csrf
                                <h3>Create Forum</h3>
                                <div>
                                    <select class="forumlist" name="dropdown">
                                        <option value="C">C</option>
                                        <option value="C#">C#</option>
                                        <option value="C++">C++</option>
                                        <option value="Go">Go</option>
                                        <option value="Ruby">Ruby</option>
                                    </select>
                                    <textarea
                                        id="textarea"
                                        class="description"
                                        name="question"
                                        form="form"
                                        rows="4"
                                        cols="20"
                                        wrap="soft"
                                        placeholder="Provide a short description..."
                                    ></textarea>
                                </div>
                                <button class="forumsubmit" type="submit">Create</button>
                                <button class="forumcancel" type="button" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
