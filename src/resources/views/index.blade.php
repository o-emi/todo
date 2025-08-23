@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    <div class="todo__alert--success">
        Todoを作成しました
    </div>
</div>

<div class="todo__content">

    <!-- フォーム全体 -->
    <!-- <form class="create-form"> -->
        <form class="create-form" action="/todos" method="post">
        @csrf
        <!-- フォームの中の入力欄+ボタンをまとめた要素 -->
        <div class="create-form__item">
            <!-- 入力ボックスそのもの -->
            <input class="create-form__item-input" type="text" name="content">
            </input>
            <!-- ボタンを包む枠 -->
            <div class="create-form__button">
                <!-- 実際の送信ボタン -->
            <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </div>
    </form>
    <!-- Todoリスト　テーブル作成 -->
    <!-- テーブル全体を囲む外枠 -->
    <div class="todo-table">
        <!-- 実際のテーブルh始まり -->
        <table class="todo-table__inner">
            <!-- ヘッダー行 -->
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>
            <!-- リスト1行目　テキスト -->
            <tr class="todo-table__row">
                <!-- td　テーブルのセル -->
                <td class="todo-table__item">
                    <!-- 更新フォーム -->
                    <form class="update-form">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="content" value="test">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <!-- 削除用フォーム -->
                <td class="todo-table__item">
                <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit"  >削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            <!-- 次の行へいく -->
            <tr class="todo-table__row">
                <!-- td　テーブルのセル -->
                <td class="todo-table__item">
                    <!-- 更新フォーム -->
                    <form class="update-form">
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="content" value="test2">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <!-- 削除用フォーム -->
                <td class="todo-table__item">
                <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit"  >削除</button>
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection



