;(function(w) {

    w.app = w.app || {};

    app.Preview = function() {
        this.$imagePreviewCancel = $('.js-image-preview-cancel');
        this.$imagePreviewDecision = $('.js-image-preview-decision');

        this._initialize();
    };

    app.Preview.prototype = {
        _initialize: function() {
            this.$imagePreviewCancel.on('click', this._imagePreviewCancel.bind(this));
            this.$imagePreviewDecision.on('click', this._imagePreviewDecision.bind(this));
            $(document).on('change', '.js-input-file', this._renderPreview.bind(this));
        },

        _renderPreview: function(e) {
            var self = this;
            if (!e.target.files.length) {
                return false;
            }
            var file = e.target.files[0],
                fileReader = new FileReader();
            self.dataUri = undefined;
            fileReader.readAsDataURL(file);
            fileReader.onload = function(event) {
                self.dataUri = event.target.result;
                $(".thumbnail-preview").css('background-image', 'url(' + self.dataUri + ')');
                $(".js-model").click();
            };
        },

        _imagePreviewCancel: function() {
            $('.js-close-modal').click();
            $('.js-input-file').replaceWith($('.js-input-file').clone());
        },

        _imagePreviewDecision: function() {
            $('.js-user-thumb').attr({
                src: this.dataUri
            });
            $('.js-close-modal').click();
        }

    };
})(window);

$(function() {
    var preview = new app.Preview();
});