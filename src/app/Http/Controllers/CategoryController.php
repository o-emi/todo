<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // データベースから全てのデータを取得
        $categories = Category::all();
        // 取得したデータをビュー（index.blade.php）に渡す。
        // return view('index', ['categories' => $categories]);をcompact関数で記述
        return view('category' , compact('categories'));
    }
// フォームから送られてきたデータをデータベースに追加する処理
    public function store(Request $request)
    {
        $category = $request->only(['name']);
        Category::create($category);

        return redirect('/')->with('message' , 'カテゴリを作成しました');
    }
}
