<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return view('index');
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
