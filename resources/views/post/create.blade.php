
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h1 class="text-center text-2xl font-semibold mb-6">Create a Post</h1>
        <div>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="post" action="{{ route('post.store') }}" class="space-y-4" enctype="multipart/form-data">
            @csrf 
            @method('post')
            <div>
                <label class="block font-semibold">Name</label>
                <input type="text" name="name" placeholder="Name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="block font-semibold">Description</label>
                <input type="text" name="description" placeholder="Description" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
<div>
    
<label class="block font-semibold">User</label>
               
            <select type="text" name="user_id" value="user_id" >

@foreach($users as $user)

    <option value="{{ $user->id }}"

        @if ($user->id == old('user_id'))

            selected="selected"

        @endif

        >{{ $user->name }}

    </option>
    
@endforeach

</select>
</div>

            <div>
                <label class="block font-semibold">Upload Image</label>
                <input type="file" id="image" name="image" />

                <img id="preview" class="mt-2" style="">
            </div>
            <div>
                <input type="submit" value="Save a New Post" class="w-full px-4 py-2 bg-green-500 text-white rounded-md cursor-pointer hover:bg-green-600">
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
