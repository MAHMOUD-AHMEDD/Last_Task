<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
class questions extends Model
{
    use HasFactory;
    protected $fillable=[
        'question',
        'type',
        'category_id',
        'is_required',
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
