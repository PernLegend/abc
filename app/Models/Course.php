<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'Serial',
        'Title',
        'Sub_Title',
        'Teacher',
        'Group',
        'Update',
        'Price',
        'Promotion',
        'End_Promotion',
        'Objective',
        'Content',
        'Need',
        'For_Who',
        'Detail',
        'Image',
    ];
}
