@extends('app')

@section('title')
    ホーム
@endsection

@section('content')
    <div class="container snippet-container animsition">
        <div class="row">
            <div class="col-sm-8">
                <h4>ナレッジを共有しよう</h4>
                <a href="{{ url('/snippet/create') }}" class="btn u-btn btn-post">ノウハウ・Tipsを投稿する</a>
                <div class="tab-pane active" id="feeds">
                    <ul class="nav nav-tabs top-tabs">
                        <li class="active"><a href="#newarrival" data-toggle="tab">新着投稿</a></li>
                        {{--<li><a href="#unsubmitted-user" data-toggle="tab">週報未提出者</a></li>--}}
                    </ul>
                    <div class="tab-content">
                        <!--新着-->
                        <div class="tab-pane active" id="newarrival">
                            <div class="comments-list" id="articles-list">
                                <ul class="blue-knowledge-list">
                                    @if($snippets)
                                        @foreach($snippets as $snippet)
                                            <li>
                                                <a href="users/{{ $snippet->users['id'] }}"><img class="blue-knowledge-list-thumb img-rounded" src="{{ $snippet->users['thumbnail'] }}" alt=""></a>
                                                <div class="blue-knowledge-list-info">
                                                    <a href="/snippet/{{ $snippet->id }}" class="blue-knowledge-list-title">{{ $snippet->title }}</a>
                                                    <ul class="list-inline">
                                                        @foreach($snippet->tags as $tag)
                                                            <li>
                                                                <a href="/tags/{{ $tag['tag'] }}" class="u-tag">{{ $tag['tag'] }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <p class="blue-knowledge-list-name">
                                                        <?php Carbon\Carbon::setLocale('ja'); ?>
                                                        <a href="users/{{ $snippet->users['id'] }}">{{ $snippet->users['name'] }}</a>が
                                                        {{ Carbon\Carbon::parse($snippet->created_at)->diffForHumans() }}に投稿しました
                                                    </p>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>まだ投稿がありません</li>
                                    @endif

                                </ul>
                            </div>
                            <div class="btn-more text-center">
                                @if($snippets)
                                    {!! $snippets->render() !!}
                                @endif
                            </div>
                        </div>
                        <!--マイフィード-->
                        {{--<div class="tab-pane" id="unsubmitted-user">--}}
                            {{--<h3>週報未提出者（<code>毎日0時00分更新</code>）</h3>--}}
                            {{--<div>--}}
                                {{--<ul class="tag-list__tags clearfix">--}}
                                    {{--@foreach($unsubmittedUsers as $user)--}}
                                        {{--<li><a href="javascript:void(0)">{{$user}}</a></li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <!--サイドバー-->
            <div class="col-sm-4">
                @section('sidebar')
                    @include('layout.sidebar')
                @show
                <div class="news-title__area clearfix">
                    <p class="news-title"><i class="fa fa-info-circle"></i>お知らせ</p>
                    <div class="news-pickup">
                        @if($newsPickup)
                            <p class="news-pickup__date">{{ $newsPickup->created_at->format('Y/m/d') }}</p>
                            <p class="news-pickup__title">{{ $newsPickup->title }}</p>
                            <p class="news-pickup__description">{{ $newsPickup->body }}</p>
                            <p class="pull-right"><a href="/info">過去のお知らせ</a></p>
                        @else
                            <p>まだお知らせはありません</p>
                        @endif
                    </div>
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
                                    ご自身登録したメールアドレスにメールが届いているはずなので、記載されているURLからパスワードをリセットしてください。
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
