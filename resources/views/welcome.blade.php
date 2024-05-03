<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Navigation Example</title>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="/" class="font-semibold text-xl text-gray-800 dark:text-white">TRAVELGRAM</a>
            <div class="flex items-center space-x-4">
                <a href="/" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Home</a>
                <a href="{{route('post.index')}}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Posts</a>
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

    <img src="https://travelprnews.com/wp-content/uploads/2021/11/https___specials-images.forbesimg.com_imageserve_920377840_0x0.jpg" alt="NO IMAGE" width=1500px height=500px !important/>

    

  

    

    
</body>
</html>
