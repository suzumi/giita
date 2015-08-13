@extends('app')

@section('title')
    「{{ $snippet->title }}」を編集
@endsection

@section('content')
    <div class="snippet-form-wrapper">
        <div class="container-fluid snippet-form-container">
            {!! Form::open(['route' => ['snippet.update', $snippet->id], 'method' => 'PUT']) !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="snippet-form-title">
                        @if(Session::has('snippetFormError'))
                            <input type="text" name="title" class="form-control" value="{{{ old('title') }}}" required>
                        @else
                            <input type="text" name="title" class="form-control" value="{{{ $snippet->title }}}" required>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="snippet-form-tag">
                        <select class="js-tags-autocomplete form-control" name="selected-tags[]" multiple="multiple"  data-tags="[@for($i = 0; $i < count($snippet->tags); $i++)@if($i === 0){{$snippet->tags[$i]['id']}}@else{{', '.$snippet->tags[$i]['id']}}@endif @endfor]">
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
                        <div class="col-sm-6 snippet-body-left">
                            <div class="snippet-form-tabs">
                                <span class="snippet-form-tab" style="display: inline-block; background-color: #fff;">本文</span>
                                <button type="button" class="comment-form-tab" data-toggle="modal" data-target="#markdown-help"><i class="fa fa-question-circle"></i>書き方</button>
                            </div>
                            <div class="snippet-form-body-panel">
                                @if(Session::has('snippetFormError'))
                                    <textarea class="form-control snippet-form-body" id="snippet-body" name="body" placeholder="Markdownで入力" required>{{ old('body') }}</textarea>
                                @else
                                    <textarea class="form-control snippet-form-body" id="snippet-body" name="body" placeholder="Markdownで入力" required>{{ $snippet->body }}</textarea>
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
                    <button class="btn u-btn pull-right"><i class="fa fa-upload"></i>更新する</button>
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

@section('scripts')
<script src="{{ asset('/js/snippet.js') }}"></script>
@endsection