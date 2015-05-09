@extends('app')

@section('content')
    <div class="snippet-form-wrapper">
        <div class="container-fluid">
            {!! Form::open(['route' => ['snippet.update', $snippet->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="snippet-form-title">
                        @if(Session::has('snippetFormError'))
                            <input type="text" name="title" class="form-control" value="{{{ old('title') }}}">
                        @else
                            <input type="text" name="title" class="form-control" value="{{{ $snippet->title }}}">
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="snippet-form-tag">
                        <select class="js-tags-autocomplete form-control" name="selected-tags[]" multiple="multiple">
                        </select>
                    </div>
                </div>
            </div>
            @if(Session::has('snippetFormError'))
                <div class="alert alert-danger" role="alert">
                    {!! Session::get('snippetFormError') !!}
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="snippet-body-wrapper clearfix">
                        <div class="col-sm-6 snippet-body">
                            <div class="snippet-form-body-panel">
                                @if(Session::has('snippetFormError'))
                                    <textarea class="form-control snippet-form-body" id="snippet-body" name="body">{{ old('body') }}</textarea>
                                @else
                                    <textarea class="form-control snippet-form-body" id="snippet-body" name="body">{{ $snippet->body }}</textarea>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 snippet-body">
                            <div class="snippet-form-body-preview-panel" id="snippet-preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-info pull-right"><i class="fa fa-upload"></i>更新する</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection