<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    public function index()
    {
        // データベースから全てのデータを取得
        $todos = Todo::all();

        // return view('index');
        // 取得したデータをビュー（index.blade.php）に渡す
        // return view('index', ['todos' => $todos]);をcompact関数で記述
        return view('index' , compact('todos'));
    }


    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);

        return redirect('/')->with('message' , 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        // id　から該当するTodoを取得
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message' , 'Todoを作成しました');
    }

        public function destroy(Request $request)
    {
        // id　から該当するTodoを取得し削除
        Todo::find($request->id)->delete();

        return redirect('/')->with('message' , 'Todoを削除しました');
    }
}
