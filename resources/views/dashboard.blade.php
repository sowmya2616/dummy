<x-app-layout>
    <!-- Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- All Posts Button -->
                    <form method="get" action="{{ route('post.index') }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            All Posts
                        </button>
                    </form>

                    <!-- Logged In Message -->
                    <div class="mt-4">
                        <p class="text-gray-800">{{ __("You're logged in!") }}</p>
                    </div>

                    <!-- Create Post Button -->
                    <form method="get" action="{{ route('post.create') }}">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">
                            Create a Post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
