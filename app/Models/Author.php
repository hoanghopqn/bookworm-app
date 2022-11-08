<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'author';
    public $fillable = [
         'id',
        'author_name'

    ];
    public function scopeAuthor($query)
    {
        return $query
            ->select(
                'id',
                'author_name' 
            );
    }
}
