
<div>
    <ul>
        <h3>User_name:{{$user->name}}</h3>
        <h3>Email:{{$user->email}}</h3>
    </ul> 
        @foreach($user ->post as $post)
        <p>
            Post_Name:{{$post ->name}}
        </p>
        <p>
            Post_Description:{{$post ->description}}
        </p>
        @foreach($post ->comment as $comment)
        <p>
            Comment:{{$comment ->comment_text}}
        </p>
        @endforeach
        @endforeach

        <form method="get" action="{{ route('post.index') }}">
            <button type="submit">Back</button>
        </form>

        
</a>
</div>
