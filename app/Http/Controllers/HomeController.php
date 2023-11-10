<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\projet;
use Illuminate\Support\Facades\DB;
use App\Models\bestFreelancer;
use App\Models\freelancer;
use App\Models\rating;
use App\Models\Repport;
use App\Models\user;
use App\Models\Course;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   //  public function __construct()
   //  {
   //      $this->middleware('auth');
   //  }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function index()
{
//select the bstfreelancers data after joining the tables best_freelancer with freelancers
$bestFreelancers = freelancer::join('best_freelancers', 'freelancers.id', '=', 'best_freelancers.idFreelancer')
->select('freelancers.*', 'best_freelancers.rate')
->orderby('best_freelancers.rate','desc')
->get();

$categories=Category::all();
$user = Auth::user();
$hasProfile = false;

// Check if the user is authenticated and has a freelancer profile
if ($user && Freelancer::where('email', $user->email)->exists()) {
    $hasProfile = true;
}

   return view('pages.acceil', compact('bestFreelancers','categories','hasProfile'));
}




     public function addprofile(){
        return view('pages.addprofile');
     }



     public function createmission(){
        $categories=Category::all();
        return view('pages.createmission')->with('categories',$categories);
     }


     public function learnmore(){
      return view('pages.learnmore');
     }


     
     public function annonces(Request $request)
{
    $category = $request->query('category');
    $categories = Category::all();
    
    $projets = Projet::byCategory($category)->paginate(3);
    $projets->appends(['category' => $category]); 
    
    return view('pages.annonce', compact('categories', 'projets'));
}
 


public function bestfreelancer(Request $request)
{
    // Fetch the freelancer based on the provided ID
    $freelancer = freelancer::findOrFail($request->freelancer);

    // Fetch the top 5 ratings for the freelancer and eager load the creator (user)
    $ratings = rating::where('freelancerId', $freelancer->id)
        ->with('user')
        ->orderBy('rate', 'desc')
        ->take(5)
        ->get();

    // Calculate the average rating from the ratings table
    //$averageRating = $ratings->avg('rate');

    return view('pages.bestfreelancer', compact('freelancer', 'ratings'));
}


public function allfreelancers(){
    $excludedFreelancerIds = bestFreelancer::pluck('idFreelancer')->toArray();
    $freelancers = freelancer::whereNotIn('id', $excludedFreelancerIds)->paginate(6);

    return view('pages.allfreelancers', compact('freelancers'));
    
}

public function admindashboard(){
    
    // $projectCounts = projet::getProjectCounts();
    // $projectsToday = projet::whereDate('created_at', now()->toDateString())->paginate(5);
    
    return view('pages.admin-dashboard');
}

public function usersregistered()
{
    $startDate = now()->subMonth();
    $endDate = now();

    $userData = User::selectRaw('DATE(created_at) AS date, COUNT(*) AS count')
        ->whereBetween('created_at', [$startDate, $endDate])
        ->groupBy('date')
        ->get();

        $users = User::orderBy('created_at', 'desc')->get();
    return view('pages.admin-usersregistered', ['userData' => $userData , 'users'=>$users]);
}


// delete user function
public function deleteuser(Request $request)
{
    $userId = $request->input('iduser');

    // Check if the user exists
    $user = User::find($userId);

    if ($user) {
        // Delete the user's projects
        Projet::where('idCreateur', $userId)->delete();

        // Delete the user's freelancer if it exists
        $freelancer = Freelancer::where('email', $user->email)->first();
        if ($freelancer) {
            $bestFreelancer = BestFreelancer::where('idFreelancer', $freelancer->id)->first();
            if ($bestFreelancer) {
                $bestFreelancer->delete();
            }

            Rating::where('freelancerId', $freelancer->id)->delete();
            $freelancer->delete();
        }

        // Delete the user's reports and ratings
        Repport::where('idRepporter', $user->id)->delete();
        Rating::where('userId', $user->id)->delete();

        // Delete the user
        $user->delete();

        // Store success message in session
        $request->session()->flash('success', 'User and associated records deleted successfully');
    } else {
        // Store error message in session
        $request->session()->flash('error', 'User not found');
    }

    // Redirect the user back to the same page
    return redirect()->back();
}

 //Block user function

 public function blockuser(Request $request)
 {
     $userId = $request->iduser;
 
     // Check if the user exists
     $user = User::find($userId);
 
     if ($user) {
         // Set the isBlocked field to true
         $user->isBlocked = true;
         $user->save();
 
         // Store success message in session
         $request->session()->flash('success', 'User blocked successfully');
     } else {
         // Store error message in session
         $request->session()->flash('error', 'User not found');
     }
 
     // Redirect the user back to the same page
     return redirect()->back();
 }
 

public function courses(){

   $categories=Category::all();
   $userCourses = Course::join('categories', 'courses.IdCategory', '=', 'categories.id')
                ->where('courses.IdCreateur', auth()->user()->id)
                ->select('courses.*', 'categories.nom as categoryName')
                ->get();



   return view('pages.courses', compact('categories','userCourses'));}


}
