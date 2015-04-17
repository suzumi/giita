;(function (w) {

    w.app = w.app || {};

    app.Snippet = function() {
        this.$preview = $("#snippet-body");

        this._initialize();
    };

    app.Snippet.prototype = {
        _initialize: function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            this.$preview.keyup(function() {

                var text = $('textarea[name="raw_body"]').val();
                $.ajax({
                    'type': 'POST',
                    'url': '/api/preview',
                    'data': {
                        'raw_body': text
                    }
                })
                .done(function (data) {
                    $("#snippet-preview").html(data);
                    console.log(data);
                })
                .fail(function (data) {
                    //console.log(data);
                });
            });
        }
    };
})(window);
$(function() {
    var snippet = new app.Snippet();
});