<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index()
    {
        // データベースから全てのデータを取得と、一緒にcategoryを取得
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        // return view('index');
// 取得したデータをビュー（index.blade.php）に渡す
        // return view('index', ['todos' => $todos]);をcompact関数で記述
        // return view('index' , compact('todos'));
// Todoに紐づくカテゴリをトップページに出力する処理を追加
        return view('index' , compact('todos', 'categories'));
    }

// フォームから送られてきたデータをデータベースに追加する処理
    public function store(TodoRequest $request)
    {
        // $todo = $request->only(['content']);
        // category__idとcontentの内容を保存に変更
        $todo = $request->only(['category_id' , 'content']);
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
// ローカルスコープを使用する
        public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }


}
