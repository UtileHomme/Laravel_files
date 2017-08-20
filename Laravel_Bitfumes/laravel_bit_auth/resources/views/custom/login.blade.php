<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Custom Registration</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">

                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                    <p class="alert alert-danger">
                        {{$error}}
                    </p>
                    @endforeach
                @endif
                <form class="form-horizontal" action="{{route('custom.login')}}" method="post">
                    {{csrf_field()}}
                    <fieldset>
                        <legend>Login Here</legend>


                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-4 control-label">Email</label>
                            <div class="col-lg-8">
                                <input class="form-control" id="inputEmail" name="email" value="{{old('email')}}" placeholder="Email" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-8">
                                <input class="form-control" id="inputPassword" name="password" placeholder="Password" type="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <script
    src="http://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
