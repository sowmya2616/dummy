<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body class="p-4">

    <h1 class="text-2xl font-bold mb-4">Post</h1>

    <div>
        @if(session()->has('success'))
            <div class="bg-green-200 text-green-800 px-4 py-2 mb-4 rounded-md">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="mb-4">
        <div>
            <a href="{{ route('post.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Create a Post</a>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="bg-gray-200 shadow-md rounded-md p-4 mb-4">
            <a href="{{ route('users.show', ['id' => $post->user->id]) }}" class="text-blue-500">User Name: {{ $post->user->name }}</a>
            <p class="text-lg font-semibold mb-2">Post Name: {{ $post->name }}</p>
            <p class="mb-2">Post Description: {{ $post->description }}</p>
            <img src="{{ asset($post->image) }}" alt="Image for {{ $post->name }}" class="mt-2 rounded-md max-w-400">

            <div class="mt-4 flex items-center">
                <livewire:counter />
                <a href="{{ route('post.edit', ['post' => $post]) }}" class="bg-blue-500 text-white px-4 py-1 rounded-md mr-2">Edit</a>

                <form method="post" action="{{ route('post.destroy', ['post' => $post]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded-md">Delete</button>
                </form>
            </div>

            <form action="{{ route('comment.store') }}" method="POST" class="mt-4 flex items-center">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="text" name="comment_text" placeholder="Add comment..." class="border rounded-md px-2 py-1 mr-2">
                <button type="submit" class="bg-gray-600 text-white px-4 py-1 rounded-md">Submit</button>
            </form>

         @foreach($post->comment as $comment)
                <p class="mt-2">Comment: {{ $comment ->comment_text }}</p>
            @endforeach   
        </div>
    @endforeach
    
    <div class="flex justify-center my-5">
    {{$posts->links()}}
</div>


    @livewireScripts
</body>

</html>
