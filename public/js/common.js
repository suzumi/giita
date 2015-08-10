;(function(w) {
    w.app = w.app || {};

    app.Common = function() {
        this.$notifyCount = $('.js-notify-btn');
        this.$notifyBox = $('.js-notify-box');

        this._initialize();
    };

    app.Common.prototype = {
        _initialize: function() {
            this._toggleClick();
        },
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
        }
    };

})(window);

$(function() {
    var Common = new app.Common();
});