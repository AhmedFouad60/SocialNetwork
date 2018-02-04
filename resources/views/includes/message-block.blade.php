@if(count($errors) > 0)
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 {{Session::get('key')}}">
            {{Session::get('message')}}
        </div>
    </div>
@endif