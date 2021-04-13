<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function customer()
    {
        $this->belongsTo(User::class);
    }

    public function services(){
        return $this->hasMany(OrderService::class);
    }
}
