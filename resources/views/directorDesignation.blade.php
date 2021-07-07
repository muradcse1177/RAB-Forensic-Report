@extends('layout')
@section('title', 'Designation')
@section('page_header', 'Signatory Management')
@section('settings','active menu-open')
@section('directorDesignation','active')
@section('content')

    @if ($message = Session::get('successMessage'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thanks!</h4>
            {{ $message }}</b>
        </div>
    @endif
    @if ($message = Session::get('errorMessage'))

        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Sorry!</h4>
            {{ $message }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                {{ Form::open(array('url' => 'insertDesignation',  'method' => 'post')) }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Textarea</label>
                            <textarea class="form-control editorText" id="editorText" rows="6" name="editorText" >{{@$designation->designation}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id" id="id" class="id">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/asset/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editorText' );
    </script>
@endsection
