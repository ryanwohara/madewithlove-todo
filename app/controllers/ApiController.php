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
	}

	public function delTodo()
	{
		$todo_ID = Input::get('todo_ID');

		DB::table('todos')->where('id', '=', $todo_ID)->delete();
	}

	public function editTodo()
	{
		$todo_ID = Input::get('todo_ID');
		$todo_Text = Input::get('todo_Text');

		DB::table('todos')->where('id', '=', $todo_ID)->update(
			array('text' => $todo_Text)
		);
	}

	public function completeTodo()
	{
		$todo_ID = Input::get('todo_ID');

		DB::table('todos')->where('id', '=', $todo_ID)->update(
			array('complete' => 1)
		);
	}

	public function reactivateTodo()
	{
		$todo_ID = Input::get('todo_ID');

		DB::table('todos')->where('id', '=', $todo_ID)->update(
			array('complete' => 0)
		);
	}

}
