<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class Specail extends Model
{
    protected $table = 'special';

    protected $fillable = [
        'title', 
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
