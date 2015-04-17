;(function (w) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var text = $('textarea[name="raw_body"]').val();
    //console.log('text: ' + text);
    $.ajax({
        'type': 'POST',
        'url': '/api/preview',
        'data': {
            //"_token": csrf,
            'raw_body': text
        }
    })
    .done(function (data) {
        $("#snippet-preview").append(data);
        console.log(data);
    })
    .fail(function (data) {
        //console.log(data);
    });
})(window);