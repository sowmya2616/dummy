<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Index</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="/" class="font-semibold text-xl text-gray-800 dark:text-white">TRAVELGRAM</a>
            <div class="flex items-center space-x-4">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Home</a>
                <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Contact Us</a>
                <!-- Authentication Links -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @foreach($posts as $post)
        
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <a href="{{ route('users.show', ['id' => $post->user->id]) }}" class="text-blue-500 hover:underline">User name: {{ $post->user->name }}</a>
            <br>
            <a href="" class="font-semibold">Post name: {{ $post->name }}</a><br>
            <span>Post Details: {{ $post->description }}</span>
            <br>
            
            <img src="{{ asset($post->image) }}" alt="Image for {{ $post->name }}" class="mt-2 rounded-md" style="max-width: 400px;">

            <!-- Comment Form -->
            <form action="{{ route('comment.store') }}" method="POST" class="mt-4 flex items-center">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}"> 
                <input type="text" name="comment_text" placeholder="Add comment..." class="border rounded-md px-2 py-1 mr-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded-md">Submit</button>
            </form>
                
            <div class="mt-4 flex items-center">
                <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="text-blue-500 hover:text-blue-700 mr-4">Edit</a>
                <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                </form>

                <!-- Like Button and Like Count -->
                <div class="flex items-center ml-4"> 
                    <button class="likeButton bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600" data-post-id="{{ $post->id }}">Like</button>
                    <span class="likeCount ml-2" data-post-id="{{ $post->id }}">0 Likes</span>
                </div>
            </div>

            @foreach($post->comment as $comment)
            <p>Comment: {{$comment->comment_text}} </p>
            @endforeach
        </div>
        @endforeach
    </div>
    <a href="http://localhost/post/create">
    <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Create New Post</button>
</a>
    <div class="container mx-auto mt-8 flex justify-center">
        <div class="inline-flex">
            <nav>
                {{ $posts->links() }}
            </nav>
        </div>
    </div>
    

    <script>
        // Initialize like counts for each post
        let likeCounts = {};

        // Attach click event listener to all like buttons
        const likeButtons = document.querySelectorAll('.likeButton');
        likeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.dataset.postId;
                if (!likeCounts[postId]) {
                    likeCounts[postId] = 0;
                }
                likeCounts[postId]++;
                const likeCountElement = document.querySelector(`.likeCount[data-post-id="${postId}"]`);
                likeCountElement.innerText = likeCounts[postId] + (likeCounts[postId] === 1 ? ' Like' : ' Likes');
            });
        });
    </script>

</body>
</html>
