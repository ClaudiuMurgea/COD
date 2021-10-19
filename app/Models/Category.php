<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['categoryname','category_id'];

    public function ParentCateg() {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function Subcategory() {
        return $this->hasMany(Category::class,'category_id','id');
    }
        
}
