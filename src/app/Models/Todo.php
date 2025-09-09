<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // このカラムだけを操作可能にする
        protected $fillable =[
            'category_id',
            'content',
        ];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }

// ローカルスコープで検索処理
        public function scopeCategorySearch($query, $category_id)
        {
            if (!empty($category_id)) {
            $query->where('category_id', $category_id);
            }
        }

        public function scopeKeywordSearch($query, $keyword)
        {
            if (!empty($keyword)) {
            $query->where('content', 'like', '%' . $keyword . '%');
            }
        }
}
