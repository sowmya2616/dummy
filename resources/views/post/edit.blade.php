
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>
<body>
    <h1>Edit a Post</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    
    <form method="post" action="{{route('post.update', ['id' => $post->id])}}">
        @csrf 
        @method('PUT')
        <div>
            <label>Post Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$post->name}}" />
        </div>
        
        <div>
            <label>Image</label>
            <input type="file " name="name" placeholder="Image" value="{{$post->image}}" disabled />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$post->description}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>
