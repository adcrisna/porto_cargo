<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = 'transactions';


    public function order()
    {
        return $this->belongsTo('App\Models\Cargo\CargoOrder', 'order_id');
    }
}