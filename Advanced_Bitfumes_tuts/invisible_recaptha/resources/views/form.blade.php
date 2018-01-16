<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
</head>
<body>

    <br>
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
    @endif

    <div class="col-lg-offset-4 col-lg-4">
        <form class="" action="store" method="post" id="form">
            {{csrf_field()}}

            <input type="text" name="name" value="" class="form-control">
            @captcha()
            <input type="submit" name="" value="Submit" class="btn btn-success">
        </form>
    </div>

</body>

<script type="text/javascript">

$(document).ready(function() {
    // $('#form').submit();
});

</script>
</html>
