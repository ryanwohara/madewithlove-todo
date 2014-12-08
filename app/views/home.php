<!doctype html>
<html lang="en" ng-app>
<head>
	<meta charset="UTF-8">
	<title>Ryan W. O'Hara's To-Do</title>
	<style type="text/css">
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		@import url(/css/style.css);
	</style>
	<script src="/js/angular.min.js"></script>
	<script src="/js/script.js"></script>
</head>
<body>
	<header>
		<h1>To-Do List</h1>
	</header>
	<div class="container" ng-controller="todoControl">
		<form ng-submit="add()">
			<input type="text" size="50" placeholder="New to-do">
		</form>
	</div>
</body>
</html>
