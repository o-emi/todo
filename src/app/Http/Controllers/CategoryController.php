<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

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
    public function store(CategoryRequest $request)
    {
// フォームから送られた”name”を取得
        $category = $request->only(['name']);
// データベースのcategoriesテーブルに新規レコードを追加
        Category::create($category);
// 登録後、一覧ページにリダイレクト
        return redirect('/categories')->with('message' , 'カテゴリを作成しました');
    }

// 更新機能の実装
        public function update(CategoryRequest $request)
    {
        $category = $request->only(['name']);
        // id　から該当するCategoryを取得
        Category::find($request->id)->update($category);

        return redirect('/categories')->with('message' , 'カテゴリを更新しました');
    }

// 削除機能の実装
        public function destroy(Request $request)
    {
        // id　から該当するCategoryを取得し削除
        Category::find($request->id)->delete();

        return redirect('/categories')->with('message' , 'カテゴリを削除しました');
    }
}
