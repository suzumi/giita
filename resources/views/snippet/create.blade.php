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
                                <select class="js-tags-autocomplete form-control" name="selected-tags[]" multiple="multiple" @if(isset($isWeeklyReport)) data-is-weekly-report="true" @endif>
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
                                <div class="col-sm-6 snippet-body-left">
                                    <div class="snippet-form-tabs">
                                        <span class="snippet-form-tab" style="display: inline-block; background-color: #fff;">Markdown</span>
                                        <button type="button" class="comment-form-tab" data-toggle="modal" data-target="#markdown-help"><i class="fa fa-question-circle"></i>書き方</button>
                                    </div>
                                    <div class="snippet-form-body-panel">
                                        @if(isset($isWeeklyReport))
                                            <textarea class="form-control snippet-form-body" id="snippet-body" name="body" required>{{{ $template }}}</textarea>
                                        @else
                                            <textarea class="form-control snippet-form-body" id="snippet-body" name="body" required>{{ old('body') }}</textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 snippet-body-right">
                                    <div class="snippet-form-tabs">
                                        <span class="snippet-form-tab" style="display: block">プレビュー</span>
                                    </div>
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
    <div class="modal fade" id="markdown-help">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <h4 class="markdownHelp_title modal-title">Markdown ヘルプ</h4>
                </div>
                <div class="markdownHelp_body modal-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>表示</th>
                            <th>Markdown</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="warning">
                            <td>
                                <b>太字</b>
                            </td>
                            <td>**text**</td>
                        </tr>
                        <tr>
                            <td>
                                <i>強調表示</i>
                            </td>
                            <td>*text*</td>
                        </tr>
                        <tr class="highlight warning">
                            <td>
                                <code>コードのインライン表示</code>
                            </td>
                            <td>`code`</td>
                        </tr>
                        <tr class="highlight">
                            <td style="padding: 0 8px;">
                                <div class="markdown-content">
                                    <div class="code-frame" data-lang="ruby" style="width: 195px;">
                                        <pre style="margin: 10px;"><code class="lang-ruby hljs">puts <span class="hljs-string">'code with syntax'</span></code></pre>
                                    </div>
                                </div>
                            </td>
                            <td>```言語名
                                <br>code
                                <br>```
                            </td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <a href="#">リンク</a>
                            </td>
                            <td>[title](http://~)</td>
                        </tr>
                        <tr>
                            <td>画像埋め込み</td>
                            <td>![alt](http://~)</td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <h4>見出し (h1~h6)</h4>
                            </td>
                            <td># text, ## text, ### text...</td>
                        </tr>
                        <tr>
                            <td>
                                <li>箇条書き</li>
                            </td>
                            <td>* item</td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <li style="list-style-type: decimal;">番号付きの箇条書き</li>
                            </td>
                            <td>1. item</td>
                        </tr>
                        <tr>
                            <td>水平線</td>
                            <td>* * *</td>
                        </tr>
                        <tr class="warning">
                            <td>
                                <blockquote style="margin: 0;">引用</blockquote>
                            </td>
                            <td>&gt; text</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection