<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bestFreelancer extends Model
{
    use HasFactory;
    //protected $table = 'best_freelancers';
    
    protected $fillable = [
        'idFreelancer',
        'rate',
    ];

    protected $casts = [
        'rate' => 'decimal:2',
    ];

    public function save(array $options = []): bool
    {
        $saved = parent::save($options);
        return $saved;
    }
    public static function create(array $attributes = [])
    {
        $bestFreelancer = new self($attributes);
        $bestFreelancer->save();
    
        return $bestFreelancer;
    }
}
