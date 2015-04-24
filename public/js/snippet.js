;(function(w) {

    w.app = w.app || {};

    app.Snippet = function() {
        this.$snippetBody = $("#snippet-body");
        this.$snippetForm = $('.snippet-form');
        this.$stockForm = $('.js-stock-form');

        this._initialize();
    };

    app.Snippet.prototype = {
        _initialize: function() {


            this._tagAutocomplete();
            this._preview();
            this._activity();
            this.$stockForm.on('submit', this._hasStockClass.bind(this));
            this._stocked();

            //this.$snippetForm.on('submit', this._snippetFormPost.bind(this));
        },
        _hasStockClass: function(e) {
            e.preventDefault();
            if (this.$stockForm.hasClass('stock')) {
                this._unstock();
            } else {
                this._stock();
            }
        },
        //_snippetFormPost: function(e) {
        //    e.preventDefault();
        //    var param = {};
        //    $(this.$snippetForm.serializeArray()).each(function(i, v) {
        //        param[v.name] = v.value;
        //    });
        //    if (Object.keys(param).length < 4) {
        //        console.log("param taran");
        //    }
        //    console.log(param);
        //    //for (var key in param) {
        //    //    console.log("key: " + key + ", value: " + param[key]);
        //    //    if (!param[key]) {
        //    //        alert("入力されていない項目があります。");
        //    //    }
        //    //}
        //},
        _tagAutocomplete: function () {

            $.ajax({
                'type': 'GET',
                'url': '/api/tag'
            })
            .done(function (data) {

                $(".js-tags-autocomplete").select2({
                    placeholder: "タグを選択してください",
                    data: data
                });
            })
            .fail(function () {
                console.log(data);
            });

        },
        _preview: function() {
            this.$snippetBody.keyup(function() {

                var html = marked($(this).val());
                $('#snippet-preview').html(html);

                //$.ajaxSetup({
                //    headers: {
                //        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //    }
                //});
                //
                //var text = $('textarea[name="body"]').val();
                //$.ajax({
                //    'type': 'POST',
                //    'url': '/api/preview',
                //    'data': {
                //        'body': text
                //    }
                //})
                //.done(function (data) {
                //    $("#snippet-preview").html(data);
                //    console.log(data);
                //})
                //.fail(function (data) {
                //    console.log(data);
                //});
            });
        },
        _activity: function() {
            var url = location.href;
            var userId = url.match(".+/(.+?)([\?#;].*)?$")[1];

            $.ajax({
                'type': 'GET',
                'url': '/api/activity/' + userId
            })
            .done(function(data) {

                $('div#js-glanceyear').glanceyear(data,
                    {
                        eventClick: function(e) { $('#debug').html('Date: '+ e.date + ', Count: ' + e.count); },
                        months: ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                        weeks: ['M','T','W','T','F','S', 'S'],
                        showToday: false,
                        today: new Date()
                    });
            })
            .fail(function() {
                console.log(data);
            });
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
                    $(".js-stock-btn").html('<button class="btn btn-warning btn-block js-spinner"><i class="fa fa-folder"></i>ストックを解除</button>');
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
                    $(".js-stock-btn").html('<button class="btn btn-default btn-block js-spinner"><i class="fa fa-folder-o"></i>ストックする</button>');
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
                        $(".js-stock-btn").html('<button class="btn btn-warning btn-block js-spinner"><i class="fa fa-folder"></i>ストックを解除</button>');
                        self.$stockForm.addClass('stock')
                    } else {
                        $(".js-stock-btn").html('<button class="btn btn-default btn-block js-spinner"><i class="fa fa-folder-o"></i>ストックする</button>');
                    }
                })
        }
    };
})(window);
$(function() {
    var snippet = new app.Snippet();
});