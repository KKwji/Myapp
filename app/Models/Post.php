<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'body',
    'In',
    'image_url',
    'user_id',
    'user_name',
    'ingredients_id',
    'category_id'
];
public function ingredients()
{
    return $this->belongsToMany(Ingredient::class);
}
public $timestamps = false;
}
