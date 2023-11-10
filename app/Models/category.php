<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

  protected $fillable=[
        'nom',
        'logo',
        'nombre_projet',
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
