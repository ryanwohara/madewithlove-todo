angular.module('todoApp', [])
  .controller('todoControl', ['$scope', '$http', function($scope, $http)
  {

  	// [active, complete]
  	todos = [{}, {}];

    $scope.getResults = function()
	{
		$http.post('/api/getTodos').
			success(function(data, status, headers, config) {
				for (todo in data)
				{
					var info = data[todo];

					todos[info['complete']][info['id']] = info['text'];
				}

			});
	};

	$scope.getTodos = function(index)
	{
		return todos[index];
	}

    $scope.add = function(todo)
    {
    	var results = $http.post('/api/addTodo', {todo_Text:todo});
    	$scope.todoText = '';
    };

    $scope.getResults();

  }]);