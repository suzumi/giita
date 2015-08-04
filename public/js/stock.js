;(function(w) {

    w.app = w.app || {};

    app.Stock = function() {
        this.$stockForm = $('.js-stock-form');

        this._initialize();
    };

    app.Stock.prototype = {
        _initialize: function() {
            this._stocked();

            this.$stockForm.on('submit', this._hasStockClass.bind(this));
        },

        _hasStockClass: function(e) {
            e.preventDefault();
            if (this.$stockForm.hasClass('stock')) {
                this._unstock();
            } else {
                this._stock();
            }
        },

        _stock: function () {

            var self = this;

            var param = this.$stockForm.serialize();

            $('.js-spinner').html('<img src="/img/icon/stock_spinner.gif">');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                'type': 'POST',
                'url': '/api/stock',
                'data': param
            })
            .done(function (data) {
                console.log("ストック成功");
                if(data['code'] == 1) {
                    $(".js-stock-btn").html('<button class="btn btn-warning btn-block js-spinner">ストック済み</button>');
                    self.$stockForm.addClass('stock');
                }
            })
            .fail(function (data) {
                console.log("失敗");
            });
        },

        _unstock: function() {

            var self = this;
            var param = this.$stockForm.serialize();

            $('.js-spinner').html('<img src="/img/icon/unstock_spinner.gif">');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                'type': 'POST',
                'url': '/api/unstock',
                'data': param
            })
            .done(function (data) {
                console.log("アンストック成功");
                if(data['code'] == 1) {
                    $(".js-stock-btn").html('<button class="btn btn-default btn-block js-spinner"><i class="fa fa-folder-o"></i>ストック</button>');
                    self.$stockForm.removeClass('stock');
                }
            })
            .fail(function (data) {
                console.log("失敗");
            });
        },

        _stocked: function () {

            var self = this;
            var userId = $(':hidden[name="userId"]').val();
            var snippetId = $(':hidden[name="snippetId"]').val();

            $.ajax({
                'type': 'GET',
                'url': '/api/stocked',
                'data': {
                    'user_id': userId,
                    'snippet_id': snippetId
                }
            })
            .done(function (data) {
                if(data == 1) {
                    $(".js-stock-btn").html('<button class="btn btn-warning btn-block js-spinner">ストック済み</button>');
                    self.$stockForm.addClass('stock')
                } else {
                    $(".js-stock-btn").html('<button class="btn btn-default btn-block js-spinner"><i class="fa fa-folder-o"></i>ストック</button>');
                }
            });
        }

    };
})(window);

$(function() {
    var stock = new app.Stock();
});