<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freelancer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'country',
        'phone_number',
        'actual_job',
        'email',
        'email_verified_at',
        'password',
        'image_path',
        'diplomas',
        'experiences',
        'cv_path',
    ];




    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'diplomas' => 'array',
        'experiences' => 'array',
        'email_verified_at' => 'datetime',
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
