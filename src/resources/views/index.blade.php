@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    @if(session('message'))
    <div class="todo__alert--success">
        {{ session('message') }}
    </div>
    @endif
        @if ($errors->any())
        <div class="todo__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="todo__content">

<!-- フォーム前のセクションタイトル -->
    <div class="section__title">
        <h2>新規作成</h2>
    </div>
    <!-- 新規作成入力フォーム -->
        <form class="create-form" action="/todos" method="post">
        @csrf
        <!-- フォームの中の入力欄+ボタンをまとめた要素 -->
        <div class="create-form__item">
            <!-- 入力ボックスそのもの -->
            <input class="create-form__item-input" type="text"
            name="content"
            value="{{ old('content') }}"/>
            <!-- カテゴリ入力（選択）欄 -->
            <select class="create-form__item-select">
                <option value="">カテゴリ</option>
            </select>
        </div>
            <!-- ボタンを包む枠 -->
        <div class="create-form__button">
                <!-- 実際の作成ボタン -->
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
<!-- フォーム前のセクションタイトル -->
    <div class="section__title">
        <h2>Todo検索</h2>
    </div>
    <!-- Todo検索フォーム -->
    <form class="search-form">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text"/>
            <!-- カテゴリ入力（選択）欄 -->
            <select class="search-form__item-select">
                <option value="">カテゴリ</option>
            </select>
        </div>
        <!-- 検索ボタン -->
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
    </form>
    <!-- Todoリスト　テーブル作成 -->
    <!-- テーブル全体を囲む外枠 -->
    <div class="todo-table">
        <!-- 実際のテーブルh始まり -->
        <table class="todo-table__inner">
            <!-- ヘッダー行 -->
            <tr class="todo-table__row">
                <th class="todo-table__header">
                    <span class="todo-table__header-span">Todo</span>
                    <span class="todo-table__header-span">カテゴリ</span>
                </th>
            </tr>
            <!-- データベースに保存されているデータを表示 -->
            @foreach ($todos as $todo)
            <!-- リスト1行目　テキスト -->
            <tr class="todo-table__row">
                <!-- td　テーブルのセル -->
                <td class="todo-table__item">
                    <!-- 更新フォーム (更新機能の実装)-->
                    <form class="update-form" action="/todos/update" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <!-- <p class="update-form__item-input">{{ $todo['content'] }}</p> -->
                            <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}"/>
                            <input type="hidden" name="id" value="{{ $todo['id'] }}"/>
                        </div>
                        <div class="update-form__item">
                            <p class="update-form__item-p">Category 1</p>
                        </div>
                        <!-- 更新ボタン -->
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <!-- 削除用フォーム -->
                <td class="todo-table__item">
                <form class="delete-form" action="/todos/delete" method="POST">
                    @method('DELETE')
                    @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $todo['id'] }}">
                            <button class="delete-form__button-submit" type="submit"  >削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection



