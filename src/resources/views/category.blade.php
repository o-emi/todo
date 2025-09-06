@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__alert">
    @if(session('message'))
    <div class="category__alert--success">
        {{ session('message') }}
    </div>
    @endif
        @if ($errors->any())
        <div class="category__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="category__content">

    <form class="create-form" action="/categories" method="post">
    @csrf
<!-- フォームの中の入力欄+ボタンをまとめた要素 -->
        <div class="create-form__item">
<!-- 入力ボックスそのもの
valueで、入力失敗した際の、入力した値を保持 -->
            <input class="create-form__item-input" type="text"
            name="name"
            value="{{ old('name') }}"/>
        </div>
<!-- ボタンを包む枠 -->
        <div class="create-form__button">
<!-- 実際の作成ボタン -->
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>
<!-- カテゴリーリスト　テーブル作成 -->
    <div class="category-table">
<!-- 実際のテーブル始まり -->
        <table class="category-table__inner">
<!-- ヘッダー行 -->
            <tr class="category-table__row">
                <th class="category-table__header">category</th>
            </tr>
<!-- データベースに保存されているデータを表示 -->
            @foreach ($categories as $category)
            <tr class="category-table__row">
<!-- td　テーブルのセル -->
                <td class="category-table__item">
                    <form class="update-form">
                        <div class="update-form__item">
<!-- 追加したカテゴリが表示されるように修正した
                            <input class="update-form__item-input" type="text"> -->
                            <input class="update-form__item-input" type="text" value="{{ $category['name'] }}">
                        </div>
<!-- ボタンを包む枠 -->
                        <div class="update-form__button">
<!-- 実際の更新ボタン -->
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form class="delete-form">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection