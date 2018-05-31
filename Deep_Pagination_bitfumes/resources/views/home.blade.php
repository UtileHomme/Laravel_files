<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <ul>
        @foreach($jatins as $jatin)
        <li>{{$jatin->name}}</li>

        @endforeach

    </ul>

    <div class="">
        {{ $jatins>links() }}

    </div>
</body>
</html>
