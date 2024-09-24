<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\Questions;
class Product_question_answers extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'question_id',
        'answer',
    ];
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function question()
    {
        return $this->belongsTo(Questions::class);
    }
}
