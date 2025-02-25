<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class Order extends Model
{
    use HasFactory;

    protected $fillable =  ['email','price','payment_id','payer_id','payment_status' ];
}
