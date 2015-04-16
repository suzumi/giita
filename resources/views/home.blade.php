@extends('app')

@section('content')
    <div class="container article-container">
        <div class="row">
            <div class="tab-pane active" id="feeds">
                <div class="col-sm-9">
                    <ul class="nav nav-tabs top-tabs">
                        <li class="active"><a href="#newarraival" data-toggle="tab">新着</a></li>
                        <li><a href="#myfeed" data-toggle="tab">マイフィード</a></li>
                    </ul>
                    <div class="tab-content">
                        <!--新着-->
                        <div class="tab-pane active" id="newarraival">
                            <div class="comments-list" id="articles-list">
                                {{--ここにドキュメントループ--}}
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
