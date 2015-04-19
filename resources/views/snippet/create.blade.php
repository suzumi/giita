@extends('app')

@section('content')
    <div class="snippet-form-wrapper">
        <div class="container-fluid">
            {{--<div class="row">--}}
            {!! Form::open(['route' => 'snippet.store']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="snippet-form-title">
                                @if(isset($isWeeklyReport))
                                {{--{!! Form::input('text', 'title', "週報  あなたの名前＜＞" , ['required', 'class' => 'form-control']) !!}--}}
                                    <input type="text" name="title" class="form-control" value="＜週報＞  {{ Auth::user()->name }}＜{{date('Y/m/d')}}＞">
                                @else
                                    {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' => 'タイトル']) !!}
                                @endif
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
                                        @if(isset($isWeeklyReport))
                                            <textarea class="form-control snippet-form-body" id="snippet-body" name="body">
                                                {{{ $template }}}
                                            </textarea>
                                        @else
                                            {!! Form::textarea('body', null, ['class' => 'form-control snippet-form-body', 'id' => 'snippet-body']) !!}
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
                            <button class="btn btn-info pull-right">投稿する</button>
                        </div>
                    </div>
            {!! Form::close() !!}
            {{--</div>--}}
        </div>
    </div>
@endsection