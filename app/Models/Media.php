<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'video_id',
        'first',
        'second',
        'third'
    ];

    public function video(){
        return $this->belongsTo(Video::class);
    }
}
