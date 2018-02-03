<form class="form-signin" action="{{route('postSignUp')}}" method="post">
    <div class="text-center mb-4">
        <img class="mb-4" src="{{URL::to('images/Logo_ZAG_fb.png')}}" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Zag Social Network</h1>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputName" name="first_name" class="form-control" placeholder="First name" required autofocus>
        <label for="inputFirstname">First name</label>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
    </div>

    <button class="btn btn-default btn-primary btn-block" type="submit">Sign Up</button>
    <a class="btn btn-light btn-primary btn-block" href="{{route('signInPage')}}">Sign In</a>

    {{csrf_field()}}
</form>