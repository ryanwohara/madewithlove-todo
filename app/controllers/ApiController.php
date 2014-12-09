<?php

class ApiController extends BaseController {

	public function getTodos()
	{
		$todos = DB::table('todos')->get();

		return $todos;
	}

	public function addTodo()
	{
		$todo = Input::get('todo_Text');

		DB::table('todos')->insert(
			array('text' => $todo, 'complete' => 0)
		);

		return $this->getTodos();
	}

	public function delTodo()
	{
		$todo_ID = Input::get('todo_ID');

		DB::table('todos')->where('id', '=', $todo_ID)->delete();

		return $this->getTodos();
	}

	public function editTodo()
	{
		$todo_ID = Input::get('todo_ID');
		$todo_Text = Input::get('todo_Text');

		DB::table('todos')->where('id', '=', $todo_ID)->update(
			array('text' => $todo_Text)
		);

		return $this->getTodos();
	}

	public function completeTodo()
	{
		$todo_ID = Input::get('todo_ID');

		DB::table('todos')->where('id', '=', $todo_ID)->update(
			array('complete' => 1)
		);

		return $this->getTodos();
	}

	public function reactivateTodo()
	{
		$todo_ID = Input::get('todo_ID');

		DB::table('todos')->where('id', '=', $todo_ID)->update(
			array('complete' => 0)
		);

		return $this->getTodos();
	}

}
