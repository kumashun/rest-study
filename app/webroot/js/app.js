var app = app || {};

//開始
(function(app) {
    var todoRouter = new app.TodoRouter();  // ①
    Backbone.history.start();               // ②
})(app);