@extends('app')

@section('title')
    イベント編集
@endsection

@section('content')
    <div class="container animsition">
        {!! Form::open(['route' => ['events.update', $event->id], 'method' => 'PUT', 'class' => 'form-horizontal u-mt20', 'files'=> true]) !!}
        <fieldset>

            <!-- Form Name -->
            <legend>イベント編集</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">イベント名<span class="label u-require">必須</span></label>
                <div class="col-md-4">
                    <input name="event_title" type="text" placeholder="例）イマドキのJavaScript勉強会" class="form-control input-md" value="{{ $event->event_title }}" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">主催者<span class="label u-require">必須</span></label>
                <div class="col-md-4">
                    <input name="event_sponsor" type="text" placeholder="例）田中太郎" class="form-control input-md" value="{{ $event->event_sponsor }}" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">日時<span class="label u-require">必須</span></label>
                <div class="col-md-2">
                    <input name="event_date" type="date" placeholder="" class="form-control input-md" value="{{ $event->event_date }}" required="">
                </div>
                <div class="col-md-2">
                    <input name="event_time" type="time" placeholder="" class="form-control input-md" value="{{ $event->event_time }}" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">詳細<span class="label u-require">必須</span></label>
                <div class="col-md-4">
                    <textarea rows="3" name="event_description" class="form-control input-md" required>{{ $event->event_description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">アイキャッチ画像</label>
                <div class="col-md-4 u-pl15">
                    <img src="{{ $event->event_eyecatch_img }}" class="mypage-user-edit-thumb event-eyecatch-thumb img-rounded js-user-thumb">
                    <label class="mypage-input-file-wrap">
                        <input type="file" name="event_eyecatch_img" class="mypage-input-file js-input-file" accept="image/*">
                        ファイルを選択
                    </label>
                </div>
                <button type="button" class="js-model" data-toggle="modal" data-target="#myModal" style="display: none;"></button>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">この画像を使用しますか？</h4>
                            </div>
                            <div class="modal-body text-center">
                                <div class="thumbnail-preview">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="js-close-modal" data-dismiss="modal" style="display: none;"></button>
                                <button type="button" class="btn btn-default js-image-preview-cancel">キャンセル</button>
                                <button type="button" class="btn btn-primary js-image-preview-decision">この画像を使用する</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">資料のURL</label>
                <div class="col-md-4">
                    @if($docs)
                        <input name="docs_url" type="text" placeholder="スライドの埋め込みURL" class="form-control input-md" value="{{ $docs[0]->docs_url }}">
                        <input type="hidden" name="doc_id" value="{{ $docs[0]->id }}">
                    @else
                        <input name="docs_url" type="text" placeholder="スライドの埋め込みURL" class="form-control input-md">
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Youtubeの動画ID</label>
                <div class="col-md-4">
                    <input name="event_youtube_video_id" type="text" placeholder="例）URLのv=3exsRhw3xt8の「3exsRhw3xt8」" class="form-control input-md" value="{{ $event->event_youtube_video_id }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-8">
                    <button class="btn u-btn pull-right"><i class="fa fa-upload"></i>更新する</button>
                </div>
            </div>

        </fieldset>
        {!! Form::close() !!}

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection