<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    ];
// 「カテゴリ一覧」や「Todoにカテゴリを紐づける」ことが中心で、カテゴリから逆にTodoを呼び出す必要がないから省略
    // public function todos()
    // {
    //     return $this->hasMany(Todo::class);
    // }
}
