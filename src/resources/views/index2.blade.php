@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="notification">
        Todoを作成しました
</div>

<div class="todo-wrapper">
<!-- 入力フォーム -->
    <form class="todo-form">
        @csrf
        <input type="text" class="todo-form__input">
        <button type="submit" class="todo-form__button">作成</button>
    </form>

<!-- Todoリスト -->
    <div class="todo-container">
        <h3>Todo</h3>

        <div class="todo-item">
            <span>test</span>
            <div class="todo-actions">
                <button class="update-btn">更新</button>
                <button class="delete-btn">削除</button>
            </div>
        </div>

        <div class="todo-item">
            <span>test2</span>
            <div class="todo-actions">
                <button class="update-btn">更新</button>
                <button class="delete-btn">削除</button>
            </div>
        </div>
    </div>

@endsection


