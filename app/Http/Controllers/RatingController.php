<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\freelancer;
use App\Models\bestFreelancer;
use App\Models\rating;

class RatingController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        $freelancerId = $request->input('freelancerId');
        $freelancer = freelancer::findOrFail($freelancerId);

        $rating = new Rating();
        $rating->userId = Auth::id();
        $rating->freelancerId = $freelancerId;
        $rating->rate = $request->input('rating');
        $rating->comment = $request->input('comment');
        $rating->save();

        // Recalculate the average rating for the freelancer
        $avgRating = rating::where('freelancerId', $freelancerId)->avg('rate');
        $bestFreelancer = bestFreelancer::where('idFreelancer', $freelancerId)->first();
    if ($bestFreelancer) {
        $bestFreelancer->rate = $avgRating;
        $bestFreelancer->save();
    }

        return redirect()->back();
    }




    public function rate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|max:255'
        ]);
        
        if ($validator->fails()) {
            // Handle validation errors
        }
    
        $freelancer = Freelancer::findOrFail($id);
        $freelancer->ratings()->create([
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment')
        ]);
    
        // Recalculate the average rating for the freelancer
        $avgRating = $freelancer->ratings()->avg('rating');
        $freelancer->update(['rate' => $avgRating]);
    
        return response()->json(['message' => 'Rating submitted successfully'], 201);
    }
    
}
