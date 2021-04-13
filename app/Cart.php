<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'service_id', 'quantity', 'price', 'ip'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
