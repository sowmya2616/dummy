<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Post</title>
</head>
<body>
    <h1>Create a Post</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label>Post_Name</label>
            <input type="text" name="name" placeholder="Name" />
        </div>
        <div>
            <label>Post_Description</label>
            <input type="text" name="description" placeholder="Description" />
        </div>

    <div>
        <p> User : <select type="text" name="user_id" value="{{ old('user_id') }}" >

                            @foreach($users as $user)

                                <option value="{{ $user->id }}"

                                    @if ($user->id == old('user_id'))

                                        selected="selected"

                                    @endif

                                    >{{ $user->name }}
        
                                </option>
                                
                            @endforeach
                        
                        </select>
        </p>
  
    </div> 

        <div>
            <label>Image</label>
            <input type="file" id="image" name="image" />
        </div>
        <div>
            <input type="submit" value="Save a New Post" />
        </div>
    </form>
</body>
</html>
