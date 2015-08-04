;(function(w) {

    w.app = w.app || {};

    app.Comment = function() {
        this.$stockForm = $('.js-stock-form');
        this.$commentFormPreview = $('.js-comment-form-preview');
        this.$commentFormEdit = $('.js-comment-form-edit');
        this.$commentDeleteBtn = $('.js-comment-delete');
        this.$snippetDeleteBtn = $('.js-snippet-delete');
        this.$commentEditBtn = $('.js-comment-edit');
        this.$commentEditCancelBtn = $('.js-comment-edit-cancel-btn');
        this.$commentEdittingTabBtn = $('.js-comment-edit-form');
        this.$commentEditPreviewBtn = $('.js-comment-edit-form-preview');

        this._initialize();
    };

    app.Comment.prototype = {
        _initialize: function() {
            this._commentPreview();
            this._commentEdit();
            this._utilDeleteConfirm();
            this._commentEditFormShow();
            this._commentEditCancel();
        },

        _tagAutocomplete: function () {
            $.ajax({
                'type': 'GET',
                'url': '/api/tag',
                'data': {
                    isWeekly: true
                }
            })
            .done(function (data) {
                var tags = data.tags;
                var weeklyReportId = data.wrTag.id;
                $(".js-tags-autocomplete").select2({
                    placeholder: "タグを選択してください",
                    data: tags
                });
                if ($(".js-tags-autocomplete").data("is-weekly-report")) {
                    $('.select2-search__field').keyup();
                    $('.select2-results__option').each(function(i) {
                        if ((i + 1) === weeklyReportId) {
                            $(this).mouseup();
                        }
                    });
                } else if ($(".js-tags-autocomplete").data("tags")) {
                    var tags = $(".js-tags-autocomplete").data("tags");
                    var tagsLength = tags.length;
                    $('.select2-search__field').keyup();
                    $('.select2-results__option').each(function(i) {
                        for (var j = 0; j < tagsLength; j++) {
                            if ((i + 1) === tags[j]) {
                                $(this).mouseup();
                            }
                        }
                    });
                }
            })
            .fail(function () {
            });

        },

        // プレビュータブを押下
        _commentPreview: function() {
            this.$commentFormPreview.on('click', function() {

                var commentFormText = $('.js-comment-form-textarea');
                var markdownContent = $('.markdown-content');
                var html = marked(commentFormText.val());

                $('.js-comment-form-edit').removeClass('is-active');
                $(this).addClass('is-active');

                commentFormText.hide();
                markdownContent.show();
                markdownContent.html(html);

                $('.markdown-content pre code').each(function(i, e) {
                    hljs.highlightBlock(e, e.className);
                });

            });

            this.$commentEditPreviewBtn.on('click', function() {

                var commentFormText = $(this).parent().parent().find('.js-comment-edit-form-textarea');
                var markdownContent = $(this).parent().parent().find('.markdown-content-edit');
                var html = marked(commentFormText.val());

                $(this).siblings('.js-comment-edit-form').removeClass('is-active');
                $(this).addClass('is-active');

                commentFormText.hide();
                markdownContent.show();
                markdownContent.html(html);

                $('.markdown-content pre code').each(function(i, e) {
                    hljs.highlightBlock(e, e.className);
                });
            });
        },
        // 編集タブを押下
        _commentEdit: function() {
            this.$commentFormEdit.on('click', function() {

                var commentFormText = $('.js-comment-form-textarea');
                var markdownContent = $('.markdown-content');

                $(this).addClass('is-active');
                $('.js-comment-form-preview').removeClass('is-active');

                commentFormText.show();
                markdownContent.hide();

            })

            this.$commentEdittingTabBtn.on('click', function() {

                var commentFormText = $(this).parent().parent().find('.js-comment-edit-form-textarea');
                var markdownContent = $(this).parent().parent().find('.markdown-content-edit');

                $(this).addClass('is-active');
                $(this).siblings('.js-comment-edit-form-preview').removeClass('is-active');

                commentFormText.show();
                markdownContent.hide();

            })

        },
         // コメント編集ボタン押下時に編集フォームを表示する
        _commentEditFormShow: function() {
            this.$commentEditBtn.on('click', function() {

                //$(this).addClass('is-editting');
                $(this).parent().next().hide();
                $(this).siblings('.edit-comment-form').show();
            });
        },
        // コメント編集中のキャンセルボタン押下
        _commentEditCancel: function() {
            this.$commentEditCancelBtn.on('click', function(e) {
                e.preventDefault();
                $(this).parent().hide();
                $(this).parent().parent().next('.comment-content').show();
            });
        },
        _utilDeleteConfirm: function() {
            this.$commentDeleteBtn.on('click', function() {
                if(window.confirm("このコメントを削除してもよろしいですか？")) {
                    location.href = $(this).attr('href');
                } else {
                    return false;
                }
            });

            this.$snippetDeleteBtn.on('click', function() {
                if(window.confirm("この投稿を削除してもよろしいですか？")) {
                    location.href = $(this).attr('href');
                } else {
                    return false;
                }
            });
        }

    };
})(window);

$(function() {
    var Comment = new app.Comment();
});