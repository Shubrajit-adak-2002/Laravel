<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    @if(isset($editInfo))
    <form action="{{url('/update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{$editInfo->user_id}}"><br>
        Name: <input type="text" name="name" id="" value="{{$editInfo->name}}"><br>
        Email: <input type="text" name="email" id="" value="{{$editInfo->email}}"><br>
        Phone: <input type="text" name="phone" id="" value="{{$editInfo->phone}}"><br>
        <input type="file" name="img" id="" value="{{$editInfo->img}}"><br>
        <button>Submit</button>
    </form>
    @endif
</body>
</html>