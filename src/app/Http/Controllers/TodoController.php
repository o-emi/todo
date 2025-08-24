<?php

namespace App\Http\Controllers;

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

    // リクエストを受け取る（storeは、保存する）
    public function store(Request $request)
    {
        // データの保存部分
        $todo = $request->only(['content']);
        Todo::create($todo);
        // '/' にリダイレクト
        return redirect('/');
    }

}
