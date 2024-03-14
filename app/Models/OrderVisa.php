<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVisa extends Model
{
    use HasFactory;
   
    protected $fillable =[
        'email',
        'price',
        'transaction',
        'status',
        'card_number',
        'exp_month',
        'exp_year',  
        'cvc'
    ];
}
