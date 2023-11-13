<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claims extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'claims';


    protected $casts = [
        'photos_of_damaged_items' => 'array',
        'photos_of_unloading_process' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transactions', 'transaction_id');
    }
}
