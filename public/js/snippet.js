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
                    console.log(data);
                });
            });
        }
    };
})(window);
$(function() {
    var snippet = new app.Snippet();
});