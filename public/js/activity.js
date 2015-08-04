;(function(w) {

    w.app = w.app || {};

    app.Activity = function() {
        this._initialize();
    };

    app.Activity.prototype = {
        _initialize: function() {
            this._activity();
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
            });
        }

    };
})(window);
$(function() {
    var activity = new app.Activity();
});