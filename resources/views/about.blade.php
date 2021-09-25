<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forums</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/aboutstyle.css') }}" />
</head>
<body>
    <nav class="navbar sticky-top navbar-dark menu">
        <a class="navbar-brand" href="/">Laraquest</a>
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

    <div class="flexbox-container">
        <div>
            <h3>What is Laraquest?</h3>
            <img class="logo" src="{{ URL::asset('images/blue_logo.png') }}">
            <p>Laraquest is a social support forum platform where users can create forums, threads and reply to different threads. And if they want they could also subscribe to any specific thread to receive daily updates about the thread. It is an Open-Source Project made by Hetarth Shah.</p>
            <h4>Tech Stack:</h4>
            <p>
                Framworks: Laravel
                Languages: HTML, CSS, JS, PHP
                External Resources: Bootstrap 4/5, Google Fonts and Icons
                Database: MySQL
                Version Control: Git/Github
            </p>
        </div>
        <div></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
