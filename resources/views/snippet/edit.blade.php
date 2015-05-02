@extends('app')

@section('content')
    <div class="snippet-form-wrapper">
        <div class="container-fluid">
            {!! Form::open(['route' => ['snippet.update', $snippet->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="snippet-form-title">
                        <input type="text" name="title" class="form-control" value="{{{ $snippet->title }}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="snippet-form-tag">
                        <select class="js-tags-autocomplete form-control" name="selected-tags[]" multiple="multiple" required>
                            <option value="9999" selected>未選択</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="snippet-body-wrapper clearfix">
                        <div class="col-sm-6 snippet-body">
                            <div class="snippet-form-body-panel">
                                <textarea class="form-control snippet-form-body" id="snippet-body" name="body">{{ $snippet->body }}</textarea>
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