<div>
    <ul>
        <li>name:{{$user->name}}</li>
        <li>email:{{$user->email}}</li>
    </ul> 

        @foreach($user ->post as $post)
        <p>
            Post_name:{{$post ->name}}
        </p>

        <p>
            description:{{$post ->description}}
        </p>

        @foreach($post ->comment as $comment)
        <p>
            comment:{{$comment ->comment_text}}
        </p>

        @endforeach
        @endforeach
        
        <a href="http://localhost/posts">
        <button >Back</button>
</a>
</div>
