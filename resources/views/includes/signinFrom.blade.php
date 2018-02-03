<form class="form-signin" action="{{route('postSignIn')}}" method="post">
    <div class="text-center mb-4">
        <img class="mb-4" src="{{URL::to('images/Logo_ZAG_fb.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Zag Social Network</h1>
    </div>

    <div class="form-label-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
        {{ csrf_field() }}
    </div>

    <div class="form-label-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>



    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>