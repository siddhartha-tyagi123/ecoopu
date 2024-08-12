<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $table = 'orderlists';

    protected $fillable = ['title', 'size', 'order_number', 'user_id'];


    public function plan()
    {
      return $this->hasMany(Plan::class, 'orderlist', 'id');
    }

    
}
