@extends('app')

@section('content')
    <div class="snippet-form-wrapper">
        <div class="container-fluid">
            {!! Form::open(['route' => 'snippet.store', 'class' => 'snippet-form']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="snippet-form-title">
                                @if(isset($isWeeklyReport))
                                    <input type="text" name="title" class="form-control" value="＜週報＞  {{ Auth::user()->name }}＜{{date('Y/m/d')}}＞">
                                @else
                                    {!! Form::input('text', 'title', old('title'), ['required', 'class' => 'form-control', 'placeholder' => 'タイトル']) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="snippet-form-tag">
                                <select class="js-tags-autocomplete form-control" name="selected-tags[]" multiple="multiple">
                                    {{--@if(isset($isWeeklyReport))--}}
                                    {{--<option value="9999" selected>週報</option>--}}
                                    {{--@endif--}}
                                </select>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('snippetFormError'))
                        <div class="alert alert-danger" role="alert">
                            {!! Session::get('snippetFormError') !!}
                        </div>
                    @endif
                    @if(isset($isWeeklyReport))
                        @if(!empty($oneBeforeSnippet))
                            <div class="one-brefore-snippet">
                                {{--<div class="one-brefore-snippet">--}}
                                    {!! $oneBeforeSnippet !!}
                                {{--</div>--}}
                            </div>
                        @endif
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="snippet-body-wrapper clearfix">
                                <div class="col-sm-6 snippet-body">
                                    <div class="snippet-form-body-panel">
                                        @if(isset($isWeeklyReport))
                                            <textarea class="form-control snippet-form-body" id="snippet-body" name="body" required>{{{ $template }}}</textarea>
                                        @else
                                            <textarea class="form-control snippet-form-body" id="snippet-body" name="body" required>{{ old('body') }}</textarea>
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
                            <button class="btn btn-info pull-right"><i class="fa fa-pencil-square-o"></i>投稿する</button>
                        </div>
                    </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection