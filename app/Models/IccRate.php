<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IccRate extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'icc_rate';
    protected $fillable = [
        'product_id',
        'icc_a',
        'icc_b',
        'icc_c'
    ];
    protected $casts = [
        'icc_a' => 'array',
        'icc_b' => 'array',
        'icc_c' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Products', 'product_id');
    }
}
