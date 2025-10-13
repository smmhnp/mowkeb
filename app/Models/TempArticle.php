<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempArticle extends Model
{
    protected $table = 'temp_article';
    
    protected $fillable = [
        'article_id'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
