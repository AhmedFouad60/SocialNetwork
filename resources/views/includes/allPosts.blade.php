<section class="row posts">
    <div class="col-md-6 offset-md-3">
        <header><h3>What other people say...</h3></header>
            @foreach($posts as $post)
            <article class="post article-size" data-postid="{{$post->id}}" >
                <p>
                    {{$post-> body }}
                </p>
                <div class="info">
                    Posted by {{$post->user->first_name}} on {{ $post->created_at }}
                </div>
                <div class="interaction">
                    <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
                    <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike'   }}</a>

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