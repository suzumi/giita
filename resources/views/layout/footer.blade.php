    <footer class="global-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="footer-feature-list">
                        <ul class="list-inline">
                            <li><a href="/users">ユーザー一覧</a></li>
                            <li><a href="/tags">タグ一覧</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-list">
                        <ul class="list-inline">
                            <li><a href="http://gizumo-inc.jp/">gizumo公式サイト</a></li>
                        </ul>
                    </div>
                    <div class="footer-copyright">
                        <span>Copyright &copy;{{{ date('Y') }}} Gizumo Inc.</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-form">
                        {!! Form::open(['action' => ['MailController@feedback'], 'method' => 'POST']) !!}
                            <div class="footer-form-body">
                                <textarea class="form-control footer-form" name="feedback-form" placeholder="Giitaについてご意見、バグを報告してください"></textarea>
                            </div>
                            <div class="footer-form-submit">
                                <button class="btn btn-default btn-block">運営に送信する</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </footer>
