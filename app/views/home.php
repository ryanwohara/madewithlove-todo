<!doctype html>
<html lang="en" ng-app="todoApp">
<head>
	<meta charset="UTF-8">
	<title>Ryan W. O'Hara's To-Do</title>
	<style type="text/css">
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		@import url(/css/style.css);
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
	<script src="/js/script.js"></script>
</head>
<body>
	<header>
		<h1>To-Do List</h1>
	</header>
	<div class="container" ng-controller="todoControl">
		<form ng-submit="add(todoText)">
			<input size="50" placeholder="New to-do" ng-model="todoText">
		</form>

		<div id="active" ng-repeat="(key, value) in getTodos(0)">
			 <div class="active">
			 	<input type="checkbox" ng-click="complete( key )"> {{ value }}
			 </div>
		</div>

		<div id="complete" ng-repeat="(key, value) in getTodos(1)">
			 <div class="complete">
			 	<input type="checkbox" ng-click="reactivate( key )" checked> {{ value }}
			 </div>
		</div>
	</div>
</body>
</html>
