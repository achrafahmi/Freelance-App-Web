<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repport extends Model
{
    use HasFactory;

    protected $fillable = [
        'idRepporter',
        'idProject' ,
        'description',
    ];

    
}
