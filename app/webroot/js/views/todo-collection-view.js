var app = app || {};

//Todo一覧表示用ビュー
(function(app) {
	app.TodoCollectionView = Backbone.View.extend({
		el : '#content',
		tagName : 'div',
		odoCollection : {},

		initialize : function() {
			//コレクションを生成
			this.todoCollection = new app.TodoCollection()

			//ollectionがデータ取得(fetch関数)の成功時に、collection内に1件データを格納するたびにaddイベントを発火するのですが、
			// そのイベントをキャッチして、addOne関数が実行されるように指定しています
			this.todoCollection.on('add', this.addOne, this);

			//el変数で指定したエレメントに、default.ctpの'#list-template'で指定されたテンプレートを描画しています。
			this.$el.html($('#list-template').html());

			//$('#new-todo')はテキストエリアです。後で使用するためinisialize処理内で取得して変数に格納しています
			this.newTodo = this.$('#new-todo');

			//下記関数呼び出し
			this.render();
		},

		events : {
			'click #addTodo' : 'onCreateTodo',
		},

		//todoCollectionのfetch()関数(サーバのAPIを呼び出す)を実行
		render : function() {
			//コレクションをフェッチ
			this.todoCollection.fetch();
			return this;
		},

		onCreateTodo : function(e) {
			this.todoCollection.create(this.newAttributes(), {
				wait : true
			});
			this.newTodo.val('');
			this.todoCollection.fetch();
		},

		//addイベントで発火され一件づつ表示される
		addOne : function(todo) {
			 var itemView = new app.TodoItemView({
				 model : todo
			 });
			 $('#todo-lists').append(itemView.render().el);
		},

		newAttributes : function() {
			return {
				todo : this.newTodo.val().trim(),
				status : 0
			}
		}

	})
})(app);