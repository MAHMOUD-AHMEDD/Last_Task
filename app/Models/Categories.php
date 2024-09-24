<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Questions;
use App\Models\Products;
class categories extends Model
{
    use HasFactory;
    protected $fillable=[
      'name'
    ];
    public function questions()
    {
        return $this->hasMany(Questions::class);
    }

    // Each category can have multiple products
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
