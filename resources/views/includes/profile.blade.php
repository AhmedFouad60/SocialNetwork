<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="http://lorempixel.com/850/280/nightlife/5/" alt="Profile image example"/>
        @if(Storage::disk('local')->has($user->first_name.'-'.$user->id.'.jpg'))
                <img align="left" class="fb-image-profile thumbnail" id="user-image" src="{{route('profile.image',['filename'=>$user->first_name.'-'.$user->id.'.jpg'])}}" alt="Profile image example"/>
        @endif

        <div class="fb-profile-text">
            <h1>
                {{ $user->first_name}}
            </h1>
            <a align="right" class="btn btn-light" id="profile-pic"><i class="material-icons">mode_edit</i>edit</a>
        </div>

    </div>
</div>
