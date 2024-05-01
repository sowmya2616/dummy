<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-200">
    <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">Posts</h1>
        <div>
            @if(session()->has('success'))
                <div class="bg-green-200 text-green-800 py-2 px-4 rounded-md mb-4">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($posts as $post)
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                    @if($post->image)
                        <img src="{{ asset('' . $post->image) }}" alt="Post Image" class="w-full h-48 object-cover" />
                    @else
                        <div class="h-48 flex items-center justify-center text-gray-500 text-lg">
                            No Image Available
                        </div>
                    @endif
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{$post->name}}</h2>
                        <p class="text-gray-700 text-base">{{$post->description}}</p>
                        <div class="mt-4 flex justify-between">
                            <a href="{{route('post.edit', ['post' => $post])}}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form method="post" action="{{route('post.destroy', ['post' => $post])}}">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <a href="{{route('post.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                Create a Post
            </a>
        </div>
    </div>
</body>
</html>
