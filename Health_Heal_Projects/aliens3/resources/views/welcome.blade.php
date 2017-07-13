<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/admin') }}">Login</a>
                        <!-- <a href="{{ url('/register') }}">Register</a> -->
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Lead Management
                </div>

                <!-- <div class="links">
                    <a href="/languages">Languages</a>
                    <a href="/genders">Gender</a>
                    <a href="/leadtypes">Lead Type</a>
                    <a href="/ptconditions">Patient Condition</a>
                    <a href="/references">References</a>
                    <a href="/relationships">Relationship</a>
                    <a href="/shiftrequireds">Shift required</a>
                    <a href="/verticals">Vertical</a>
                </div>
                <br>
                <div class="links">
                    <a href="/cc">Customer care</a>
                     <a href="/vh/create">Vertical head</a> -->
                    <!--<a href="/leadtypes">Lead Type</a>
                    <a href="/ptconditions">Patient Condition</a>
                    <a href="/references">References</a>
                    <a href="/relationships">Relationship</a>
                    <a href="/shiftrequireds">Shift required</a>
                    <a href="/verticals">Vertical</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
