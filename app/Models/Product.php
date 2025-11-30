<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','size','color','price','stock','description'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}