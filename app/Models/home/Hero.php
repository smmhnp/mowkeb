<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = "hero";

    protected $fillable = ['title', 'sub_title', 'btn_text', 'photo'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
