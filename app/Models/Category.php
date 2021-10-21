<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['categoryname','category_id'];

    public function Subcategory() {
        return $this->hasMany(Self::class,'category_id','id');
    }

    public function ParentCateg() {
        return $this->hasOne(Self::class,'category_id','id');
    }

        
}
