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
                'url': '/api/tag',
                'data': {
                    isWeekly: true
                }
            })
            .done(function (data) {
                var tags = data.tags;
                //var weeklyReportId = data.wrTag.id;
                $(".js-tags-autocomplete").select2({
                    placeholder: "タグを選択してください",
                    data: tags
                });
                if ($(".js-tags-autocomplete").data("is-weekly-report")) {
                    $('.select2-search__field').keyup();
                    $('.select2-results__option').each(function(i) {
                        //if ((i + 1) === weeklyReportId) {
                        //    $(this).mouseup();
                        //}
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

        _preview: function() {
            this.$snippetBody.keyup(function() {

                var html = marked($(this).val());
                $('#snippet-preview').html(html);

                $('#snippet-preview pre code').each(function(i, e) {
                    hljs.highlightBlock(e, e.className);
                });
            });
        }

    };
})(window);

$(function() {
    var snippet = new app.Snippet();
});