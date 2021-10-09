<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/aboutstyle.css') }}" />
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

    <div class="wrapper">

        <div class="card1">

            <h3>What is Laraquest?</h3>
            <div class="flexbox-container">
                
                <div>
                    <i class="fas fa-paper-plane logo"></i>
                </div>

                <div class="description">
                    Laraquest is a social support platform where users can create their forums and threads as well as reply to existing threads. Moreover, users can subscribe to their preferred threads to keep up with it by recieving notifications. This entire project is Open-Source and has been put together by Hetarth Shah.
                </div>

            </div>

            <div class="tech-stack">

                <h3>Tech Stack:</h3>
                <a href="https://laravel.com/" alt="Laravel">
                    <i class="fab fa-laravel laravel"></i>
                </a>
                <a href="https://www.postgresql.org/">
                    <i class="fab fa-deskpro sql"></i>
                </a>
                <i class="fab fa-html5 html5"></i>
                <i class="fab fa-css3 css3"></i>
                <i class="fab fa-js-square js"></i>
                <i class="fab fa-php php"></i>
                <a href="https://getbootstrap.com/">
                    <i class="fab fa-bootstrap bootstrap"></i>
                </a>
                <a href="https://fontawesome.com/">
                    <i class="fab fa-font-awesome fontawesome"></i>
                </a>
                <a href="https://github.com/">
                    <i class="bi bi-github github"></i>
                </a>
                <br>
                <a href="https://github.com/Hetarth02/laraquest">
                    <button class="source-code">
                        <i class="bi bi-code-slash"></i>Source Code
                    </button>
                </a>

            </div>

        </div>

        <div class="card2">

            <h3>About Me...</h3>
            <p class="description">
                Hello,
                I am Hetarth Shah, the face behind Laraquest. Web development is not my forte, but I can say my skills are novice. My actual ambitions are to be a Python Programmer. I am my own teacher, and have self-taught myself with a certain degree of experience in working with Laravel framework. I am constantly pushing myself out of the comfort zone through this web development journey, seeing how far can I go. Though I usually have multiple projects on hand to further increase my learning; I am open to any collaboratory projects.
            </p>
            <h4>Found any <i class="bi bi-bug-fill bug"></i>(Bugs),</h4>
            <h3>Want to do a project together?</h3>
            <h3>Connect via</h3>
            <a href="https://github.com/Hetarth02">
                <i class="bi bi-github github"></i>
            </a>
            <a href="https://www.linkedin.com/in/hetarth-shah-1ab392220">
                <i class="bi bi-linkedin linkedin"></i>
            </a>
            <a href="https://instagram.com/sophist._.guy">
                <i class="bi bi-instagram instagram"></i>
            </a>

        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
