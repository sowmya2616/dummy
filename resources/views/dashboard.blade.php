<x-app-layout>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div style="margin-bottom:80px; margin-left:30px; padding: 20px; ">
                    <a href="{{route('post.create')}}" style="background-color:red; padding: 20px">
                        Create Post 
                    </a>
                </div>
            </div>
        </div>
    </div>   
</x-app-layout>

