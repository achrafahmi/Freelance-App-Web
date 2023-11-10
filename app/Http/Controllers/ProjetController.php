<?php
namespace App\Http\Controllers;


use App\Models\category;
use Illuminate\Routing\Controller;
use App\Models\projet;
use App\Models\Repport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class ProjetController extends Controller
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'societe' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric'],
            'description' => ['required', 'string'],
            
        ]);
    }

    public function create(Request $request)
    {
        
        $data = $request->all();

        $validator = $this->validator($data);

        if ($request->has('exit')) {
            //return redirect()->back();
             return redirect()->route('home');
          }
          else {
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        $data['idCreateur'] = $user->id;

        $category = category::where('nom', $data['category'])->first();
        $data['idCategory'] = $category->id;

        $projet = projet::create($data);
        $data['societe'] = $request->input('societe');


        
            Session::flash('successMessage', 'Mission created successfully!');
            //return redirect()->route('project.create', ['projet' => $projet->id]);
            return redirect()->back();
        }
    }


//     public function show(Projet $projet)
// {
//     return view('pages.show', compact('projet'));
// }

// public function success(Request $request)
//     {
//         $successMessage = $request->input('successMessage');
//         return view('pages.success', compact('successMessage'));
//     }
public function projectsstats(){
    $projectCounts = projet::getProjectCounts();
    $projectsToday = projet::whereDate('created_at', now()->toDateString())->paginate(5);
    
    return view('pages.admin-projectsstats', compact('projectCounts', 'projectsToday'));
}


public function projectsrepported(){
    $projects = Projet::join('repports', 'projets.id', '=', 'repports.idProject')
        ->join('users', 'users.id', '=', 'repports.idRepporter')
        ->select('projets.id','projets.title', 'projets.description', 'projets.prix', 'users.username', 'repports.description as report_description')
        ->paginate(10);

    return view('pages.admin-projectsrepported', ['projects' => $projects]);
}


public function deleteprojet(Request $request){
      
    $idprojet=$request->idprojet;
    $projet = Projet::find($idprojet ) ;

    if($projet){
        $repport=Repport::where('IdProject' ,$idprojet );
        if($repport){
            $repport->delete();
        }

        $projet->delete();
        $request->session()->flash('success', 'Project deleted successfully');

    }
    else{
        $request->session()->flash('error', 'Project not found');
    }

    return redirect()->back();

}


public function annonceaction(Request $request){

    if($request->has('delete')){
        $this->deleteprojet($request) ;
    }
    if($request->has('done')){
        $idproject=$request->idprojet;
        $project=Projet::where('id',$idproject)->first();
        if($project){
          $project->isAvailable=false;
          $project->save();
          $request->session()->flash('success', 'Project is not available any more');
        }
        else{
          $request->session()->flash('error', 'Project not found');
        }
      }
      
    return redirect()->back();

}



}
?>
