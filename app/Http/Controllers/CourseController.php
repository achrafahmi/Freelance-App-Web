<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\CourseRating;
use App\Models\category;

class CourseController extends Controller
{
  
    public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'courseTitle' => 'required|string|max:255',
        'courseDescription' => 'required|string',
        'courseCategory' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $categoryName = $request->input('courseCategory');
    $category = Category::where('nom', $categoryName)->first();

    $course = new Course();
    $course->title = $request->input('courseTitle');
    $course->description = $request->input('courseDescription');
    $course->IdCreateur = auth()->user()->id;
    $course->IdCategory = $category->id;
    $course->save();

    return redirect()->route('courses');
}




public function categorycourses(Request $request)
{
    $idcategory = $request->input('category');

    $courses = Course::select('courses.*', 'categories.nom as categoryName', 'avg_ratings.averageRating')
        ->join('categories', 'courses.idCategory', '=', 'categories.id')
        ->leftJoinSub(
            'SELECT IdCourse, AVG(rate) as averageRating FROM course_ratings GROUP BY IdCourse',
            'avg_ratings',
            'courses.id',
            '=',
            'avg_ratings.IdCourse'
        )
        ->where('idCategory', $idcategory)
        ->orderByDesc('avg_ratings.averageRating')
        ->get();

    return view('pages.categorycourses', compact('courses'));
}








public function searchcourse(Request $request){
    if ($request->filled('query')) {
        $query = $request->input('query');
    
        // Retrieve the freelancers whose 'prenom' or 'nom' contains the search query
        $coursesSearched = Course::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->join('categories', 'courses.idCategory', '=', 'categories.id')
        ->select('courses.*', 'categories.nom as categoryName')
        ->get();

        
        session(['coursesSearched' => $coursesSearched]);
        //return  redirect()->back()->with('coursesSearched',$coursesSearched);
        return  redirect()->back();
    } else {
        return redirect()->back();
    }
}


public function createcourserating(Request $request){

    $validator = Validator::make($request->all(), [
        'rating_course' => 'required|numeric',
        'IdCreateur' => 'required|numeric',
        'IdCourse' => 'required|numeric',
    ]);
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }


        $ratecourse = new CourseRating();
        $ratecourse->rate = $request->input('rating_course');
        $ratecourse->IdCreateur = $request->input('IdCreateur');
        $ratecourse->IdCourse = $request->input('IdCourse');
        $ratecourse->save();
        return redirect()->back()->with('success', 'Thank you for sharing your opinion.');

}


}
