<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    @if(isset($userInfo))
    <table border="2">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @foreach($userInfo as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td><img src="{{$user->img}}" alt=""></td>
                <td><a href="{{url('/edit')}}{{$user->user_id}}">Edit</a> | <a href="{{url('/delete')}}{{$user->user_id}}">Delete</a></td>
            </tr>
            @endforeach
        </table>
    @endif
</body>
</html>