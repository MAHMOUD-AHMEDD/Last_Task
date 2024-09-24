<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Product_question_answers;
class products extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'info',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function answers()
    {
        return $this->hasMany(Product_question_answers::class);
    }
}
