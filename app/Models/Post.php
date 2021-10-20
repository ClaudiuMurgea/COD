<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'city_id', 'category_id', 'type_id'];

    public function City() {
        return $this->belongsTo(City::class);
    }

    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function Type()
    {
        return $this->belongsTo(Type::class);
    }
}
