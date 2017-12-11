<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
          <div class="col-lg-offset-4 col-lg-4">
              <br>

              @if(count($errors)>0)

                @foreach($errors->all() as $error)

                <p class="alert alert-danger">{{$error}}</p>
                @endforeach

              @endif
              <form class="" action="" method="post">
                  {{csrf_field()}}

                  <div class="form-group">
                      <input type="text" name="name" value="" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                      <input type="text" name="email" value="" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                      <input type="submit" value="Submit" class="btn btn-success">
                  </div>
              </form>
          </div>
        </div>
    </div>
</body>
</html>
