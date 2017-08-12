<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Hindi Tutorial</title>
</head>
<body>
    <div class="container">
        <h1>Master Layout</h1>
        <!-- Whereever we write yield, the extended part content will start from there -->
        @yield('content')
    </div>
</body>
</html>
