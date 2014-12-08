angular.module('todoApp', [])
  .controller('todoControl', ['$scope', '$http', function($scope, $http)
  {

  	// [active, complete]
  	$scope.todos = [{}, {}];

    $scope.getResults = function()
	{

		$http.post('/api/getTodos').
			success(function(data, status, headers, config) {
				for (todo in data)
				{
					var info = data[todo];

					$scope.todos[info['complete']][info['id']] = info['text'];
				}
			});
	};

	$scope.getTodos = function(index)
	{
		return $scope.todos[index];
	}

    $scope.add = function(todo)
    {
    	var results = $http.post('/api/addTodo', {todo_Text:todo});
    	
    	$scope.todoText = '';
    };

    $scope.complete = function(todoID)
    {
    	$http.post('/api/completeTodo', {todo_ID:todoID});

    	$scope.todos[1][todoID] = $scope.todos[0][todoID];

    	delete $scope.todos[0][todoID];
    }

    $scope.reactivate = function(todoID)
    {
    	$http.post('/api/reactivateTodo', {todo_ID:todoID});

    	$scope.todos[0][todoID] = $scope.todos[1][todoID];

    	delete $scope.todos[1][todoID];
    }

    $scope.delTodo = function(todoID)
    {
    	$http.post('/api/delTodo', {todo_ID:todoID});

    	$scope.getResults();
    }

    $scope.editTodo = function(todoID, todoText)
    {

    }

    $scope.getResults();

  }]);