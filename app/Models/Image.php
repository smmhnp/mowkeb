<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Image extends Model
{
    use HasFactory, Notifiable;

    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
