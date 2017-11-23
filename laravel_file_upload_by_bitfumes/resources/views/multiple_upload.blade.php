<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
            <br>
            <form class="form-horizontal" action="{{route('multipleupload.file')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <input type="file" name="file[]" value="" multiple="true">
                    <input type="submit" name="" value="Submit" class="btn btn-info">
            </form>
        </div>

        <div class="row">
            <h2>Show file</h2>
            <img src="{{ asset('storage/upload/jatin.jpg')}}" alt="">
        </div>
    </div>

</body>
</html>
