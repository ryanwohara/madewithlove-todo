angular.module('todoApp', [])
  .controller('todoControl', ['$scope', '$http', function($scope, $http)
  {

  	// [active, complete]
  	$scope.todos = [{}, {}];

  	$scope.processResults = function(results)
  	{
		for (todo in results)
		{
			var info = results[todo];

			$scope.todos[info['complete']][info['id']] = info['text'];
		}
  	}

    $scope.getResults = function()
	{
		$http.post('/api/getTodos').
			success(function(data) {
				$scope.processResults(data);
			});
	};

	$scope.getTodos = function(index)
	{
		return $scope.todos[index];
	}

    $scope.add = function(todo)
    {
    	$http.post('/api/addTodo', {todo_Text:todo}).
			success(function(data) {
				$scope.processResults(data);
			});
    	
    	$scope.todoText = '';

    	$scope.getResults();
    };

    $scope.complete = function(todoID)
    {
    	$http.post('/api/completeTodo', {todo_ID:todoID}).
			success(function(data) {
				$scope.processResults(data);
			});;

    	$scope.todos[1][todoID] = $scope.todos[0][todoID];

    	delete $scope.todos[0][todoID];
    }

    $scope.reactivate = function(todoID)
    {
    	$http.post('/api/reactivateTodo', {todo_ID:todoID}).
			success(function(data) {
				$scope.processResults(data);
			});;

    	$scope.todos[0][todoID] = $scope.todos[1][todoID];

    	delete $scope.todos[1][todoID];
    }

    $scope.delTodo = function(index, todoID)
    {
    	$http.post('/api/delTodo', {todo_ID:todoID})

    	delete $scope.todos[index][todoID];
    }

    $scope.getResults();

  }]);