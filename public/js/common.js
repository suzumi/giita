;(function(w) {
    w.app = w.app || {};

    app.Common = function() {
        this.$notifyCount = $('.js-notify-btn');
        this.$notifyBox = $('.js-notify-box');
        this.$commentDeleteBtn = $('.js-comment-delete');
        this.$snippetDeleteBtn = $('.js-snippet-delete');

        this._initialize();
    };

    app.Common.prototype = {
        _initialize: function() {
            this._toggleClick();
            this._notifications();
            this._utilDeleteConfirm();
        },
        // 通知ボタンのクリック
        _toggleClick: function() {
            var self = this;

            this.$notifyCount.on('click', function(e) {
                e.stopPropagation();
                self.$notifyBox.show();
            });

            this.$notifyBox.on('click', function(e) {
                e.stopPropagation();
            });

            $('html').on('click', function() {

                self.$notifyBox.hide();
            });
        },
        _notifications: function() {


            $.ajax({
                'type': 'GET',
                'url': '/api/notifications'
            })
            .done(function(data) {

                    var template = '';
                    var cnt = 0;

                    if (data.length != 0) {

                        for (var i = 0; i < data.notifications.length; i++) {
                            var unreadList =  (data.notifications[i].unread_flg)? '<li class="globalNotificationContents_listItem js-notification-unread-color">': '<li class="globalNotificationContents_listItem">';
                                template +=
                                    unreadList +
                                    '<a href="/snippet/' + data.notifications[i].snippet_id + '?read=1&nty=' + data.notifications[i].notify_id + '#comment-' + data.notifications[i].comment_id + '" class="globalNotificationContents_itemLink">' +
                                    '<div class="globalNotificationContents_itemIcon">' +
                                        '<img src="' + data.notifications[i].thumbnail + '">' +
                                    '</div>' +
                                    '<div class="globalNotificationContents_itemText">' +
                                        '<span class="bold">' + data.notifications[i].name + '</span>があなたの投稿<span class="title">"' + data.notifications[i].title + '"</span>に<span class="bold">コメント</span>しました。' +
                                    '<div class="status">' + data.notificationsTimeAgo[i] + '</div>' +
                                    '</div>' +
                                    '</a>' +
                                '</li>';
                            if (data.notifications[i].unread_flg) cnt++;
                        }

                    } else {
                        template = '<p>お知らせはありません</p>';
                    }
                    $('.js-notify-btn').html('<div class="notification-count">' + cnt + '</div>');
                    $('.js-globalNotification_list').html(template);

                    if (cnt > 0) {
                        $('.notification-count').addClass('js-notification-cnt');
                    }
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
    var Common = new app.Common();
});
