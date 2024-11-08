<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <h1>Form</h1>
    <form action="{{url('/submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        Name: <input type="text" name="name" id=""><br>
        Email: <input type="text" name="email" id=""><br>
        Phone: <input type="text" name="phone" id=""><br>
        <input type="file" name="img" id=""><br>
        <button>Submit</button>
    </form>
    @if(isset($user))
        <table border="2">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
            </tr>
            <tr>
                <td>{{$user['name']}}</td>
                <td><a href="mailto:{{$user['email']}}">{{$user['email']}}</a></td>
                <td><a href="tel:{{$user['phone']}}">{{$user['phone']}}</a></td>
                <td><img src="{{$user['img']}}" height="100px" width="100px"></td>
            </tr>
        </table>
    @endif
</body>
</html>