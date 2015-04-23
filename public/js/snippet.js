;(function(w) {

    w.app = w.app || {};

    app.Snippet = function() {
        this.$snippetBody = $("#snippet-body");

        this._initialize();
    };

    app.Snippet.prototype = {
        _initialize: function() {

            this._tagAutocomplete();
            this._preview();
            this._activity();
        },
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
        }
    };
})(window);
$(function() {
    var snippet = new app.Snippet();
});