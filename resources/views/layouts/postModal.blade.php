@extends('includes.modal')
@section('modal-id')
    edit-modal
@endsection
@section('modal-header')
    Edit post
@endsection
@section('modal-body')
    <form>
        <div class="form-group">
            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
        </div>
    </form>
@endsection
@section('model-footer')
    <button type="button" id="modal-save" class="btn btn-primary">Save changes</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
@endsection
@section('modal-js')
    <script>
        var token='{{Session::token()}}';
        var url='{{route('edit')}}';
    </script>
@endsection