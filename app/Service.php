<?php

namespace App;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;
use App\Multiimage;

class Service extends Model
{
    // protected $guarded = [];

    protected $fillable = [
        'service_name',
        'service_slug',
        'service_code',
        'category_id',
        'owner_id',
        'short_desc',
        'long_desc',
        'price',
        // 'img_1',
        // 'img_2',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images(){
        return $this->hasMany(Multiimage::class);
    }
}
