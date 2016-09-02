<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright	 Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link		  http://cakephp.org CakePHP(tm) Project
 * @package		app.View.Layouts
 * @since		 CakePHP(tm) v 0.10.0.1076
 * @license		http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>シンプルTODOアプリ</title>
</head>
<body>
	<!-- コンテンツ -->
	<div id="main"></div>
	<!-- TODO一覧表示のテンプレート -->
	<script type="text/template" id="list-template">
	<h1>TODOリスト</h1>
	<textarea style="width:300px;height:50px"id="new-todo" placeholder="Todo?" autofocus></textarea>
	<input type="button" id="addTodo" value="追加"
	<hr>
	<div>
		<table border="1" width="350px">
			<tbody id="todo-lists"></tbody>
		</table>
	</div>
	</script>

	<!-- TODO一行分のテンプレート（上のtbody部分に挿入される） -->
	<script type="text/template" id="item-template">
	<td><input type="checkbox" class="toggle" <%- status === '1' ? 'checked' : '' %>></td>
	<td style="margin:0px">
		<span class="todo-edit" style="margin:0px"><%- todo %></span>
	</td>
	<td style="width:200px;">
		<a class="remove-link" href="#">削除</a>
		<a class="detail-link" href="#todo-lists/<%- id %>">詳細</a>
	</td>
	</script>
	<!-- 詳細画面 -->
	<script type="text/template" id="detail-template">
	<h2>Todo #<%- id %></h2>
	<div>
	<textarea style="width:300px;height:50px" id="edit-todo" autofocus placeholder="Todo?"><%- todo %></textarea>
	<input type="button" id="updateTodo" value="更新"></input>
	<input type="button" id="updateCancel" value="キャンセル"></input>
	</div>
	</script>

	<!-- ① js(library) -->
	<script src="js/lib/jquery-2.1.3.min.js" type="text/javascript"></script>
	<script src="js/lib/underscore-min.js" type="text/javascript"></script>
	<script src="js/lib/backbone-min.js" type="text/javascript"></script>

	<!-- js(application) -->
	<!--	model	-->
	<script src="js/models/todo-model.js" type="text/javascript"></script>
	<!--	collection	-->
	<script src="js/collections/todo-collection.js" type="text/javascript"></script>
	<!--	view	-->
	<script src="js/views/todo-item-view.js" type="text/javascript"></script>
	<script src="js/views/todo-detail-view.js" type="text/javascript"></script>
	<script src="js/views/todo-collection-view.js" type="text/javascript"></script
	<!--  ② router	-->
	<script src="js/routers/router.js" type="text/javascript"></script>
	<!--  ③ entry point	-->
	<script src="js/app.js" type="text/javascript"></script>

</body>
</html>