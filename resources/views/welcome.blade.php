<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRAVELGRAM</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <nav class="bg-white shadow-sm py-4">
        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo or Site Name -->
            <a href="/" class="text-xl font-semibold text-black">TRAVELGRAM</a>
            
            <!-- Navigation Links -->
            <ul class="flex gap-4">
                <li>
                    <a href=" ">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{route('post.index')}} ">
                        Posts
                    </a>
                </li>
          <!--      <li>
                    <a href=" ">
                        Contact Us
                    </a>
                </li>  -->
            
            <!-- Authentication Links -->
    
                @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a> 
                    @else
                        <a href="{{ route('login') }}" >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
            </ul>
      
    </nav>

    <img src= "https://wallpapers.com/images/hd/travel-hd-4zjwrepl0mzn70nd.jpg " alt ="IMAGE">
</body>
</html>
