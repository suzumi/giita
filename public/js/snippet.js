;
(function (w) {
    var text = $('textarea[name="raw_body"]').val();
    console.log('text: ' + text);
    $.ajax({
        'type': 'POST',
        'url': '/api/preview',
        'data': {
            "_token": csrf,
            'raw_body': text
        }
    })
    .done(function (data) {
        console.log(data);
    })
    .fail(function (data) {
        console.log(data);
    });
})(window);