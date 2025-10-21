<?php

namespace App\Models;

use App\Models\home\TempCetegories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Categorie extends Model
{
    use HasFactory, Notifiable;
    
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public static function getTempCategories()
    {
        $temp = TempCetegories::first();

        $data = array_slice(array_values($temp->toArray()), 1, 4);

        $records = self::whereIn('id', $data)->get();

        return collect($data)->map(function ($id) use ($records) {
            return $records->where('id', $id)->first();
        });
    }
}
