<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'price',
        'description',
        'days',
        'status',
        'orderlist'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function orderlist()
    {
        return $this->belongsTo(OrderList::class);
    }
}
