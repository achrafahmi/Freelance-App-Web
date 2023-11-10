<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Lesson;


class LessonController extends Controller
{
    public function create(Request $request)
{
    $validatedData = $request->validate([
        'courseId' => 'required|integer',
        'lessonTitle' => 'required|string',
        'lessonDescription' => 'required|string',
        'lessonType' => 'required|in:file,video',
        'lessonFile' => 'required|file',
    ]);
        
    // Validate file extension if lessonType is 'file'
    if ($validatedData['lessonType'] === 'file') {
        $extension = $request->file('lessonFile')->getClientOriginalExtension();
        $allowedExtensions = ['pdf', 'doc', 'docx']; // Add more allowed extensions if needed

        if (!in_array($extension, $allowedExtensions)) {
            return redirect()->back()->withErrors(['lessonFile' => 'Invalid file extension. Only PDF, DOC, DOCX, MP4, and MOV files are allowed.'])->withInput();
        }
    }

    // Validate file extension if lessonType is 'video'
    if ($validatedData['lessonType'] === 'video') {
        $extension = $request->file('lessonFile')->getClientOriginalExtension();
        $allowedExtensions = ['mp4', 'mov']; // Add more allowed extensions if needed

        if (!in_array($extension, $allowedExtensions)) {
            return redirect()->back()->withErrors(['lessonFile' => 'Invalid file extension. Only MP4 and MOV video files are allowed.'])->withInput();
        }
    }
    $lesson = new Lesson();
    $lesson->title = $validatedData['lessonTitle'];
    $lesson->description = $validatedData['lessonDescription'];
    $lesson->type = $validatedData['lessonType'];
    $lesson->IdCourse = $validatedData['courseId'];

    // Handle file upload
if ($request->hasFile('lessonFile')) {
    $file = $request->file('lessonFile');
    $fileName = $file->getClientOriginalName();

    if ($validatedData['lessonType'] === 'file') {
        $folder = 'uploads/files_courses';
    } else {
        $folder = 'uploads/videos_courses';
    }

    $imagePath = $file->store($folder, 'public');

    $lesson->content_path = $imagePath;
}



    $lesson->save();

    return redirect()->route('courses');
}
  

public function courselessons(Request $request){

    $idcourse=$request->courseId;
    $lessons=Lesson::where('idCourse', $idcourse)->get();

return view('pages.courselessons', ['lessons' => $lessons , 'idcourse'=> $idcourse]);

}

public function usercourselessons(Request $request){
    $idcourse=$request->courseId;
    $lessons=Lesson::where('idCourse', $idcourse)->get();

return view('pages.usercourselessons', ['lessons' => $lessons , 'idcourse'=> $idcourse]);

}

public function deleteLesson(Request $request)
{
    $idLesson = $request->input('idLesson');

 
    $lesson = Lesson::find($idLesson);
    if ($lesson) {
        $lesson->delete();
        return redirect()->back()->with('success', 'Lesson deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Lesson not found.');
    }
}



}
