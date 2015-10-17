;(function(w) {

    w.app = w.app || {};

    app.Connpass = function() {
        this._initialize();
    };

    app.Connpass.prototype = {
        _initialize: function() {
            this._eventsOfConnpass();
        },
        _eventsOfConnpass: function() {
            var date = new Date();

            $.ajax({
                'type': 'GET',
                'url': 'http://connpass.com/api/v1/event/',
                'dataType': 'jsonp',
                'timeout':5000,
                'data': {
                    'ym': date.getFullYear() + '0' + (Number(date.getMonth()) + 1),
                    'keyword': '東京',
                    'order': 3
                }
            })
            .done(function(data) {
                var template = '';
                for (var i = 0; i < data.events.length; i++) {
                    var dateTime = new Date(data.events[i].started_at);
                    template +=
                    '<div class="event-list">' +
                        '<div class="event-list-date">' +
                            '<div class="count">' + (dateTime.getMonth() + 1) + '/' + pad(dateTime.getDate())+ '</div>' +
                            '<div class="unit">' + dateTime.getHours() + ':' + ('0' + dateTime.getMinutes()).slice(-2) + '</div>' +
                        '</div>' +
                        '<div class="event-list-description">' +
                            '<a href="' + data.events[i].event_url + ' " target="_blank">' + data.events[i].title + '</a>' +
                            '<div class="event-address">' + data.events[i].address + '</div>' +
                        '</div>' +
                    '</div>';
                }
                $('.js-event-list').html(template);
            })
            .fail(function() {
                var template =
                    '<h4><code>Connpassがメンテ中の可能性があります。</code></h4>' +
                    '<a href="http://connpass.com/" target="_blank">connpass公式サイト</a>をご確認ください。';
                $('.js-event-list').html(template);
            });
        }
    };
})(window);

function pad(n) {return (n<10 ? '0'+n : n);}

$(function() {
    var connpass = new app.Connpass();
});