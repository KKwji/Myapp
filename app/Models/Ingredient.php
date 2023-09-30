<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    
    protected $fillable = [
    
    'ingredient',
    'post_id',
    'created_at',
    'updated_at',
];
    
    public function posts()
{
    return $this->belongsToMany(Post::class);
}

}
