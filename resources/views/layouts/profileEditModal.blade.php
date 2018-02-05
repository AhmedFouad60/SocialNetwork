@extends('includes.modal')
@section('modal-id')
    profile-modal
@endsection
@section('modal-header')
    Edit account
@endsection
@section('modal-body')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="" id="first_name">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
@endsection
@section('model-footer')
    <button type="submit" class="btn btn-primary">Save Account</button>

    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
@endsection
@section('modal-js')
    <script>
        var token='{{Session::token()}}';
        //var url='{{route('edit.profile')}}';
    </script>
@endsection