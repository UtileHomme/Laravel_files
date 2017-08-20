<!-- Using blade -->

<!DOCTYPE html>
<html>
<head>
    <title>My Webpage</title>
</head>
<body>
    <h1>Welcome to my page</h1>
    <h2>Customers</h2>
    @foreach($customers as $customer)
    <p>
        {{$customer->name}}
    </p>
    @endforeach

    @if(true)
    {{'hello'}}
    @endif
</body>
</html>
