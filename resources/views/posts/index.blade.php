<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex justify-center items-center h-screen bg-gray-200">
    <div class="w-full max-w-xl p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">Post</h1>
        <div>
            @if(session()->has('success'))
                <div class="bg-green-200 text-green-800 py-2 px-4 rounded-md mb-4">
                    {{session('success')}}
                </div>
            @endif
        </div>
        <div class="mb-4">
            <div class="mb-2">
                <a href="{{route('post.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                    Create a Post
                </a>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Image</th> <!-- New column for image -->
                        <th class="px-4 py-2">Edit</th>
                        <th class="px-4 py-2">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">{{$post->id}}</td>
                            <td class="border px-4 py-2">{{$post->name}}</td>
                            <td class="border px-4 py-2">{{$post->description}}</td>
                            <td class="border px-4 py-2">
                                @if($post->image)
                                    <img src="{{ asset('' . $post->image) }}" alt="Post Image" class="h-16 w-16" />
                                @else
                                    No Image Available
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{route('post.edit', ['post' => $post])}}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            </td>
                            <td class="border px-4 py-2">
                                <form method="post" action="{{route('post.destroy', ['post' => $post])}}">
                                    @csrf 
                                    @method('delete')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
