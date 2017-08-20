<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pagination</title>
    <style>
        .pagination li
        {
            display:inline;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="container">
            <table>
                <thead>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</body>
</html>
