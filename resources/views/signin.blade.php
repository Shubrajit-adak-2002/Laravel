<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigin</title>
</head>
<body>
    @if(session('message'))
    {{session('message')}}
    @endif
    <form action="{{/login}}" method="post">
        @csrf
        User Name : <input type="text" name="uname" id=""><br>
        Phone : <input type="text" name="phone" id=""><br>
        <button>Submit</button>
    </form>
</body>
</html>