<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'category';
    public $fillable = [
         'id',
        'category_name'

    ];
    public function scopeCategory($query)
    {
        return $query
            ->select(
                'id',
                'category_name' 
            );
    }
}
