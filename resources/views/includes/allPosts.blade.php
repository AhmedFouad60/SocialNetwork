<section class="row posts">
    <div class="col-md-6 offset-md-3">
        <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
            <article class="post" data-postid="{{$post->id}}">
                <p>
                    {{$post-> body }}
                </p>
                <div class="info">
                    Posted by {{$post->user->first_name}} on {{ $post->created_at }}
                </div>
                <div class="interaction">
                    <a href="#" class="like">like</a> |
                    <a href="#" class="like">Dislike</a>
                    @if(Auth::user()==$post->user)
                        |
                        <a href="#" class="edit">Edit</a> |
                        <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                    @endif
                </div>
            </article>
             @endforeach

    </div>
</section>