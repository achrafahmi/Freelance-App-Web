<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bestFreelancer;

class BestFreelancersController extends Controller
{
    public function implementBestFreelancers()
{
    $bestFreelancers = Rating::select('freelancerId', DB::raw('AVG(rate) as average_rate'))
                             ->groupBy('freelancerId')
                             ->orderBy('average_rate', 'desc')
                             ->take(10)
                             ->get();
    
    foreach ($bestFreelancers as $bestFreelancer) {
        BestFreelancer::updateOrCreate(
            ['idFreelancer' => $bestFreelancer->freelancerId],
            ['rate' => $bestFreelancer->average_rate]
        );
    }
    
    // Rest of your code...
}

}
