<section class="row new-post">
    <div class="col-md-6 offset-md-3">
        <header><h3>What do you have to say?</h3></header>
        <form action="{{ route('post.create') }}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>

        </form>


    </div>
</section>