<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Model;

class TempCetegories extends Model
{
    protected $table = 'temp_categoies';
    protected $fillable = [
        'first',
        'seconde',
        'third',
        'fourth'
    ];
}
