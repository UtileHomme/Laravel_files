<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @foreach($data as $data2)

    <p>{{$data2->id}}</p>


    @endforeach

    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                {!! $data2->links() !!}
            </ul>
        </div>
    </div>
</body>
</html>
