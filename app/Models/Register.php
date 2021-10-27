<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = [
        'Gender',
        'FirstName',
        'LastName',
        'NickName',
        'Tel',
        'Whatsapp',
        'Wechat',
        'Facebook',
        'Province',
        'District',
        'Village',
        'Image',
    ];
}
