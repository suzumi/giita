@extends('app')

@section('content')
    <div class="snippet-form-wrapper">
        <div class="container-fluid">
            {{--<div class="row">--}}
            {!! Form::open(['url' => 'api/preview', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="snippet-form-title">
                                <input placeholder="タイトル" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="snippet-form-tag">
                                <input placeholder="タグ" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="snippet-body-wrapper clearfix">
                                <div class="col-sm-6 snippet-body">
                                    <div class="snippet-form-body-panel">
                                        {!! Form::textarea('raw_body', null, ['class' => 'form-control snippet-form-body']) !!}
                                        {{--<textarea class="form-control snippet-form-body"></textarea>--}}
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
                            <button class="btn btn-info pull-right">投稿する</button>
                        </div>
                    </div>
            {!! Form::close() !!}
            {{--</div>--}}
        </div>
    </div>
@endsection