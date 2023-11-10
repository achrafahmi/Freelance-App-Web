<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'IdCreateur',
        'IdCourse',
    ];

    public function save(array $options=[]):bool
    {
        $saved = parent::save($options);
        return $saved;
    } 
    
}
