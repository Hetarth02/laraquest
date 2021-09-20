<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/registerstyle.css') }}" />
</head>

<body>
    <form class="registerform" action="/userregister" method="POST">
        @csrf
        <h3>Register</h3>
        <div class="flexbox-container">
            <div class="flex-item1">
                <img class="logo" src="{{ URL::asset('images/blue_logo.png') }}">
            </div>
            <div class="flex-item2">
                <div>
                    <input
                        type="text"
                        name="name"
                        placeholder="Full Name"
                        required=""
                    />
                    <input
                        type="email"
                        name="email"
                        placeholder="E-mail"
                        required=""
                    />
                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        required=""
                    />
                </div>
                <div>
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        required=""
                    />
                </div>
                <button type="submit">Register</button>
                <button type="reset">Reset</button>
                <div>
                    Already registered,
                    <a href="/login">Sign In!</a>
                </div>
            </div>
        </div>
    </form>

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
