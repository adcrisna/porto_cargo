<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'product';
    protected $casts = [
        'additional_cost' => 'array',
        'goods_type' => 'array'
    ];


    public function rate()
    {
        return $this->hasOne('App\Models\IccRate', 'product_id');
    }
}
