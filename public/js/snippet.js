;(function(w) {
    "use strict";

    w.app = w.app || {};

    app.Snippet = function() {
        this.$snippetBody = $("#snippet-body");

        this._initialize();
    };

    app.Snippet.prototype = {
        _initialize: function() {

            this._preview();
        },
        _preview: function() {
            this.$snippetBody.keypress(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var text = $('textarea[name="body"]').val();
                $.ajax({
                    'type': 'POST',
                    'url': '/api/preview',
                    'data': {
                        'body': text
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