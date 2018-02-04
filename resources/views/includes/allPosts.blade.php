<section class="row posts">
    <div class="col-md-6 offset-md-3">
        <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
            <article class="post">
                <p>
                    {{$post-> body }}
                </p>
                <div class="info">
                    Posted by {{$post->user->first_name}} on {{ $post->created_at }}
                </div>
                <div class="interaction">
                    <a href="#" class="like">like</a> |
                    <a href="#" class="like">Dislike</a>

                        |
                        <a href="#" class="edit">Edit</a> |
                        <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>

                </div>
            </article>
             @endforeach

    </div>
</section>