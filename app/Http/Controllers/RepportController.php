<?php


namespace App\Http\Controllers;

use App\Models\Repport;
use Illuminate\Http\Request;

class RepportController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'description' => ['required','string', 'max:255'],
            'idProject' => ['required','numeric'],
            'idRepporter' =>['required','numeric']
        ]);

       // $validatedData['idProject']=$request->idproject;
        Repport::create($validatedData);

        
        return redirect()->back()->with('success', 'Your report will be considered');
    }
}

