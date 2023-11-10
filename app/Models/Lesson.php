<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
       'description',
       'type',
       'content_path',
       'IdCourse',
        
    ];

    public function save(array $options=[]):bool
    {
        $saved = parent::save($options);
        return $saved;
    } 
    
    public static function all($columns = ['*'])
    {
        return parent::all($columns);
    }
    
}
