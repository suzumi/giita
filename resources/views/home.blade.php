@extends('app')

@section('content')
    <div class="container snippet-container">
        <div class="row">
            <div class="col-sm-9">
                <h4>ナレッジを共有しよう</h4>
                <a href="{{ url('/snippet/create') }}" class="btn btn-info btn-post">ノウハウ・Tips・週報を投稿する</a>
                <div class="tab-pane active" id="feeds">
                    <ul class="nav nav-tabs top-tabs">
                        <li class="active"><a href="#newarraival" data-toggle="tab">新着</a></li>
                        <li><a href="#weekly-report" data-toggle="tab">週報</a></li>
                    </ul>
                    <div class="tab-content">
                        <!--新着-->
                        <div class="tab-pane active" id="newarraival">
                            <div class="comments-list" id="articles-list">
                                <ul class="blue-knowledge-list">
                                    @foreach($snippets as $snippet)
{{--                                        {{{ dd($snippet) }}}--}}
                                    <li>
                                        <img class="blue-knowledge-list-thumb" src="data:image/jpeg;base64,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" alt="">
                                        <div class="blue-knowledge-list-info">
                                            <a href="/snippet/{{{ $snippet->id }}}" class="blue-knowledge-list-title">{{{ $snippet->title }}}</a>
                                            {{{ $snippet->tag }}}
                                            <p class="blue-knowledge-list-name">osamu38</p>
                                            <p class="blue-knowledge-list-date">{{{ $snippet->created_at->format('Y/m/d') }}}に投稿</p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="btn-more text-center">
                                <a id="view-more" class="btn btn-default btn-block" href="#">もっと見る</a>
                            </div>
                        </div>
                        <!--マイフィード-->
                        <!--<div class="tab-pane" id="myfeed">-->
                        <!--<div class="comments-list">-->
                        <!--<% @articles.each do |article| %>-->
                        <!--<div class="media">-->
                        <!--<span class="media-left">-->
                        <!--&lt;!&ndash;<img src="http://lorempixel.com/40/40/people/1/">&ndash;&gt;-->
                        <!--</span>-->

                        <!--<div class="media-body">-->
                        <!--<p>-->
                        <!--<small><%= article.published.strftime("%Y/%m/%d") %></small>-->
                        <!--<small class="pull-right">-->
                        <!--<button type="button" class="btn btn-link like-button">-->
                        <!--<i class="glyphicon glyphicon-heart-empty"></i></button>-->
                        <!--</small>-->
                        <!--</p>-->
                        <!--<p class="media-heading article-name">-->
                        <!--<a href="<%= article.url %>" target="_blank"><%= article.name %></p></a>-->
                        <!--<p>-->
                        <!--<small>Posted by</small>-->
                        <!--<span><a href="blogs/<%= article.blog_id %>"><%= article.blog.name %></a></span>-->
                        <!--</p>-->
                        <!--</div>-->
                        <!--</div>-->
                        <!--<% end %>-->
                        <!--</div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <!--サイドバー-->
            <div class="col-sm-3">
                <div class="list-group">
                    <a class="list-group-item" href="#">週報</a>
                    <a class="list-group-item" href="#">ほげほげ</a>
                    <a class="list-group-item" href="#">ふがふが</a>
                </div>
            </div>
        </div>
    </div>
@endsection
