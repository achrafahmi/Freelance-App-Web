<?php
namespace App\Http\Controllers;

use App\Models\freelancer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\projet;
use Illuminate\Support\Facades\Session;
class FreelancerController extends Controller
{

    public function create(Request $request)
    {
        $email = $request->input('email');
        $lastName = $request->input('familyname');
        $firstName = $request->input('firstname');
        $existingFreelancer = Freelancer::where('email', $email)
            ->where('nom', $lastName)
            ->where('prenom', $firstName)
            ->first();
        
        if ($existingFreelancer) {
            return redirect()->back()->withInput()->with('errorMessage', 'Freelancer with the provided email, last name, and first name already exists.');
        }

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'familyname' => 'required|string',
            'address' => 'required|string',
            'numero' => 'required|string',
            'actualjob' => 'nullable|string',
            // 'email' => 'required|email|unique:freelancers,email',
            // 'password' => 'required|string',
            'profile' => 'required|image',
            'cv' => 'required|file',
            'diplomas' => 'nullable|array',
            'experiences' => 'nullable|array',
        ]);
        
        if ($request->has('exit')) {
            //return redirect()->back();
             return redirect()->route('home');
          }
          else {


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
      

        if ($request->hasFile('profile')) {
            $imageFile = $request->file('profile');
            $imagePath = $imageFile->store('uploads/images', 'public');
            $validatedData['image_path'] = $imagePath;
        
            
            $imageFolder = 'uploads/images';
            if (!Storage::disk('public')->exists($imageFolder)) {
                Storage::disk('public')->makeDirectory($imageFolder);
            }
        }
        

        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvPath = $cvFile->store('uploads/cv', 'public');
            $validatedData['cv_path'] = $cvPath;
            
           
            $cvFolder = 'uploads/cv';
            if (!Storage::disk('public')->exists($cvFolder)) {
                Storage::disk('public')->makeDirectory($cvFolder);
            }
        }
        

        
         $user = Auth::user();

         
         $email = $user->email;
         $password = $user->password;
         $data = $request->all();

         
         $freelancer = new freelancer([
            'nom' => $request->input('familyname'),
            'prenom' => $request->input('firstname'),
            'country' => $request->input('address'),
            'phone_number' =>$request->input('numero'),
            'actual_job' => $request->input('actualjob'),
            'email' => $email,
            'password' => $password,
            'image_path' => $imagePath,
            'cv_path' => $cvPath,
            'diplomas' => $request->input('diplomas'),
            'experiences' => $request->input('experiences'),
            'email_verified_at' => now(),
        ]);
        
        // Save the freelancer instance
        $freelancer->save();
        if ($freelancer->wasRecentlyCreated) {
            Session::flash('successMessage', 'Your Freelancer profile is created successfully');
            return redirect()->back();
        }
     }
    }

    public function myprofile(){
        $user = Auth::user();
        $freelancer = freelancer::where('email', $user->email)->first();
        $projects = projet::where('idCreateur', $user->id)->get();
        if (!$freelancer) {
            return redirect()->route('addprofile');
        }
        return view('pages.myprofile', compact('freelancer', 'projects'));
       }

    public function search(Request $request){
        if ($request->filled('query')) {
            $query = $request->input('query');
        
            // Retrieve the freelancers whose 'prenom' or 'nom' contains the search query
            $freelancers = Freelancer::where('prenom', 'like', '%' . $query . '%')
                                    ->orWhere('nom', 'like', '%' . $query . '%')
                                    ->orWhere('actual_job', 'like', '%' . $query . '%')
                                    ->orWhere('country', 'like', '%' . $query . '%')
                                    ->orWhere('diplomas', 'like', '%' . $query . '%')
                                    ->orWhere('experiences', 'like', '%' . $query . '%')
                                    ->paginate(6);
        
            return view('pages.allfreelancers', compact('freelancers'));
        } else {
            return redirect()->back();
        }
        
       }

    
       public function editprofil(Request $request)
       {
           $freelancerId = $request->input('idFreelancer');
           $freelancer = Freelancer::find($freelancerId);
       
           // Update the freelancer's attributes based on the form inputs
           $freelancer->prenom = $request->input('firstName');
           $freelancer->nom = $request->input('familyName');
           $freelancer->actual_job = $request->input('actualJob');
           $freelancer->country = $request->input('country');
           //$freelancer->address = $request->input('address');
           $freelancer->phone_number = $request->input('phone');
          // $freelancer->email = $request->input('email');
          // Update diplomas
          $diplomas = $request->input('diplomas');
            $freelancer->diplomas = $diplomas;

            // Update experiences
            $experiences = $request->input('experiences');
            $freelancer->experiences = $experiences;
       
           if ($request->hasFile('profileImage')) {
               $imageFile = $request->file('profileImage');
               $imagePath = $imageFile->store('uploads/images', 'public');
               $freelancer->image_path = $imagePath;
       
               $imageFolder = 'uploads/images';
               if (!Storage::disk('public')->exists($imageFolder)) {
                   Storage::disk('public')->makeDirectory($imageFolder);
               }
           }
       
           if ($request->hasFile('cv')) {
               $cvFile = $request->file('cv');
               $cvPath = $cvFile->store('uploads/cv', 'public');
               $freelancer->cv_path = $cvPath;
       
               $cvFolder = 'uploads/cv';
               if (!Storage::disk('public')->exists($cvFolder)) {
                   Storage::disk('public')->makeDirectory($cvFolder);
               }
           }
       
           // Save the changes
           $freelancer->save();
       
            // Set the success message in the session
    Session::flash('success', 'Profile updated successfully');

    // Redirect the user or perform any other desired action
    return redirect()->back();
       }
       
}
?>
