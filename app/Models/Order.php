<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'User_ID',
        'Time_Table',
        'Serial_Course',
        'Price',
        'Promotion',
        'Bill',
        'Serial_Bill',
        'Status',
    ];
}
