@extends('app')

@section('content')
    <div class="container snippet-container">
        <div class="row">
            <div class="col-sm-9">
                <h4>ナレッジを共有しよう</h4>
                <a href="{{ url('/snippet/create') }}" class="btn btn-info btn-post">ノウハウ・Tips・週報を投稿する</a>
                <div class="tab-pane active" id="feeds">
                    <ul class="nav nav-tabs top-tabs">
                        <li class="active"><a href="#newarraival" data-toggle="tab">新着投稿</a></li>
                        {{--<li><a href="#weekly-report" data-toggle="tab">週報</a></li>--}}
                    </ul>
                    <div class="tab-content">
                        <!--新着-->
                        <div class="tab-pane active" id="newarraival">
                            <div class="comments-list" id="articles-list">
                                <ul class="blue-knowledge-list">
                                    @foreach($snippets as $snippet)
{{--                                        {{{ dd($snippet) }}}--}}
                                    <li>
                                        <img class="blue-knowledge-list-thumb img-rounded" src="/{{{ $snippet->users['thumbnail'] }}}" alt="">
                                        <div class="blue-knowledge-list-info">
                                            <a href="/snippet/{{{ $snippet->id }}}" class="blue-knowledge-list-title">{{{ $snippet->title }}}</a>
                                            <ul class="list-inline">
                                            @foreach($snippet->tags as $tag)
                                                <li>
                                                    <a href="/tags/{{ $tag['tag'] }}" class="u-tag">{{{ $tag['tag'] }}}</a>
                                                </li>
                                            @endforeach
                                            </ul>
                                            <p class="blue-knowledge-list-name">{{{ $snippet->users['name'] }}}が{{{ $snippet->created_at->format('Y/m/d H:i') }}}に投稿しました</p>
                                            {{--<p class="blue-knowledge-list-date">{{{ $snippet->created_at->format('Y/m/d H:i') }}}</p>--}}
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="btn-more text-center">
                                {!! $snippets->render() !!}
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
                <div class="user-info">
                    <div class="user-info-left">
                        <img class="img-rounded" src="/{{ Auth::user()->thumbnail }}">
                    </div>
                    <div class="user-info-right">
                        <div class="user-info-name">
                            <a href="/users/{{ Auth::user()->id }}">{{ Auth::user()->name }}</a>
                        </div>
                    </div>
                </div>
                <div class="category-navigation">
                    <ul class="nav nav-pills nav-stacked">
                        <li role="presentation" class="active"><a href="/">フィード</a></li>
                    </ul>
                </div>
                <div class="news-title__area clearfix">
                    <p class="news-title"><i class="fa fa-info-circle"></i>お知らせ</p>
                    <div class="news-pickup">
                        <p class="news-pickup__date">{{ $newsPickup->created_at->format('Y/m/d') }}</p>
                        <p class="news-pickup__title">{{ $newsPickup->title }}</p>
                        <p class="news-pickup__description">{{ $newsPickup->body }}</p>
                    </div>
                    <p class="pull-right"><a href="/info">過去のお知らせ</a></p>
                </div>
                <div class="ad-banner-blog">
                    <a href="http://engineer.blue-corporation.jp/" target="_blank">
                        <img src="/img/assets/07a7b746e4e773b5cb59dfc69a5f5ce2.png" class="img-responsive">
                    </a>
                </div>
                <div class="faq-list">
                    <div class="faq-title"><i class="fa fa-question-circle"></i>よくある質問</div>
                    <div class="accordion" id="side-bar">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse"
                                   data-parent="#side-bar" href="#area02">パスワードはどうやって変えるの？</a>
                            </div>
                            <div id="area02" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    一旦ログアウトして、<strong>「パスワードをお忘れですか？」</strong>からパスワードリセット申請をしてください。<br>
                                    ご自身の<code>@blue-corporation.jp</code>ドメインにメールが届いているはずなので、記載されているURLからパスワードをリセットしてください。
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="side-bar">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse"
                                   data-parent="#side-bar" href="#area03">検索機能はないの？</a>
                            </div>
                            <div id="area03" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    全文検索を実装しようとしています。<br>
                                    鋭意開発中です。
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="side-bar">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse"
                                   data-parent="#side-bar" href="#area04">タグを追加したい！</a>
                            </div>
                            <div id="area04" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    フッターのお問い合わせから追加したいタグを申請してください。<br>
                                    業務時間中であれば秒速で対応します。
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
