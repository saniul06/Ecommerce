<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $guarded = [];

    public function service()
    {
        $this->belongsTo(Service::class);
    }

    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
