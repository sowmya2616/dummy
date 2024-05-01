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
                <a href="/contact" class="px-3 py-2 rounded-md text-sm font-medium text-gray-800 transition duration-150 ease-in-out hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">Contact Us</a>
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

    <!-- Images -->
    <div class="container mx-auto mt-8 grid grid-cols-3 gap-4">
        <div class="relative rounded-lg overflow-hidden group">
            <img src="https://www.letsroam.com/explorer/wp-content/uploads/sites/10/2021/10/travel-tips-feature.jpg" alt="Image 1" class="rounded-lg">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300"></div>
        </div>
        <div class="relative rounded-lg overflow-hidden group">
            <img src="https://theincidentaltourist.com/wp-content/uploads/2022/09/Taj-Mahal-cultural-tourism-5264542_1920.jpeg" alt="Image 2" class="rounded-lg">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300"></div>
        </div>
        <div class="relative rounded-lg overflow-hidden group">
            <img src="https://www.bsr.org/images/heroes/bsr-travel-hero..jpg" alt="Image 3" class="rounded-lg">
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300"></div>
        </div>
    </div>
</body>
</html>
