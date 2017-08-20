<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>First route</title>
</head>
<body>
    <h1>Hello about</h1>

    <!-- Checking for true value -->
    @unless($data)
        There is no data
    @endunless
    @foreach($data as $da)
    {{$da}}
    @endforeach
</body>
</html>
