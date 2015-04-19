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

            var tags = [{id: 0, text: 'Scala'},{id: 1, text: 'PHP'},{id: 2, text: 'WordPress'},{id: 3, text: '週報'}];
            $(".js-tags-autocomplete").select2({
                placeholder: "タグを選択してください",
                data: tags
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
                    //console.log(data);
                });
            });
        }
    };
})(window);
$(function() {
    var snippet = new app.Snippet();
});