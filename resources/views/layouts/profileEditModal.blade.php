@extends('includes.modal')
@section('modal-header')
    Edit profile
@endsection
@section('modal-body')
    <form>

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