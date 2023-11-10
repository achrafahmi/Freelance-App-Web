<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bestfreelancer;


class rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'freelancerId',
        'rate',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancerId');
    }
//=========================================================
public function save(array $options = []): bool
{
    $saved = parent::save($options);

    // Calculate average rate for the freelancer and update bestFreelancer table
    $freelancerId = $this->freelancerId;
    $averageRate = self::where('freelancerId', $freelancerId)->avg('rate');

    $bestFreelancer = BestFreelancer::first();
    if (!$bestFreelancer || $averageRate > $bestFreelancer->rate) {
        if ($bestFreelancer) {
            $bestFreelancer->delete();
        }

        BestFreelancer::create([
            'idFreelancer' => $freelancerId,
            'rate' => $averageRate,
        ]);
    }

    return $saved;
}

}
