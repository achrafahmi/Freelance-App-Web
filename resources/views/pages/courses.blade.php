@extends('Layouts.app')
@section('content')
<div class="container">
<div class="row mb-5">
    <div class="col-md-6">
{{-- share a course link card  --}}
<div class="card-share-course">
    <a class="card1 text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#shareCourseModal">
     <p class="fw-bold">Share A Course</p>
     <div class="go-corner" href="#">
       <div class="go-arrow">
         →
       </div>
     </div>
   </a>
 </div>
 {{-- end of share a course link card  --}}
</div>
<div class="col-md-6">
<!-- Search Bar -->
<div class="search-bar float-right">
    <form class="search-form d-flex align-items-center" action="{{route('searchcourse')}}" method="GET">
        @csrf
        
        <div class="group">
          <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
          <input placeholder="Search" type="search" class="input" name="query">
          <button type="submit" class="btn " style="background-color: #00838d" title="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
        </div>
    </form>
</div>
<!-- End Search Bar -->
</div>
</div>
{{-- error message   --}}
@if ($errors->has('lessonFile'))
<div class="alert alert-danger ">{{ $errors->first('lessonFile') }}</div>
@endif
{{-- end of error message   --}}



{{-- The courses created by this user --}}
@if($userCourses->isEmpty())
    <h2 class="fs-2 titre-h3 fw-bold">No courses created yet.</h2>
@else
    <h2 class="fs-2 titre-h3 fw-bold ">My shared courses</h2>
    <div class="container">
        <div class="row">
            @foreach($userCourses as $mycourse)
                <div class="col-md-3">
                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <p class="course-alert">{{$mycourse->title}}</p>
                        </div>
                        <p class="course-message">
                            {{$mycourse->description}}
                        </p>
                        <strong>{{$mycourse->categoryName}}</strong>
                        <div class="course-actions">
                            <a class="course-read" href="{{ route('usercourselessons', ['courseId' => $mycourse->id]) }}">
                                Take a Look
                            </a>
                            <button class="course-mark-as-read" href="" onclick="showLessonForm({{ $mycourse->id }})">
                                Add a Lesson
                            </button>
                        </div>
                        <!-- Lesson Creation Modal -->
                        <div class="modal fade" id="lessonModal-{{ $mycourse->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="lessonModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="lessonModalLabel">Create a Lesson</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('lesson.create')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="courseId" value="{{ $mycourse->id }}">
                                            <div class="mb-3">
                                                <label for="lessonTitle" class="form-label">Lesson Title</label>
                                                <input type="text" class="form-control" name="lessonTitle"
                                                    id="lessonTitle" placeholder="Enter lesson title">
                                            </div>
                                            <div class="mb-3">
                                                <label for="lessonDescription" class="form-label">Lesson
                                                    Description</label>
                                                <textarea class="form-control" name="lessonDescription"
                                                    id="lessonDescription" rows="3"
                                                    placeholder="Enter lesson description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="lessonType" class="form-label">Lesson Type</label><br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lessonType"
                                                        id="video" value="video">
                                                    <label class="form-check-label" for="video">Video</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="lessonType"
                                                        id="file" value="file">
                                                    <label class="form-check-label" for="file">File</label>
                                                </div>
                                                <!-- Add more radio button options if needed -->
                                            </div>
                                            <div class="mb-3">
                                                <label for="lessonFile" class="form-label">Upload the
                                                    lesson</label>
                                                <input type="file" name="lessonFile" id="lessonFile">
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-primary" name="create">Create Lesson</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Add your footer buttons if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Lesson Creation Modal -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif



{{-- end of courses created by this user --}}




{{-- Courses Searched --}}
<div class="row mt-5 mb-5 ">
    <div class="container text-center">
    @if (session()->has('coursesSearched'))
        @php
            $coursesSearched = session('coursesSearched');
        @endphp
        @if ($coursesSearched->isNotEmpty())
            <h2 class="mb-5 fs-2 titre-h3 fw-bold">The courses you searched for</h2>
            <div class="container">
                <div class="row">
                    @foreach ($coursesSearched as $Scourse)
                        <div class="col-md-3">
                            <div class="course-card">
                                <div class="course-header">
                                    <span class="course-icon">
                                        <i class="fa-solid fa-graduation-cap"></i>
                                    </span>
                                    <p class="course-alert">{{ $Scourse->title }}</p>
                                </div>
                                <p class="course-message">
                                    {{ $Scourse->description }}
                                </p>
                                <strong>{{ $Scourse->categoryName }}</strong>
                                <div class="course-actions">
                                    <a class="course-read"
                                        href="{{ route('courselessons', ['courseId' => $Scourse->id]) }}">Take a Look</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            {{-- <h2>No course found.</h2> --}}
        @endif
    @endif
</div>
</div>




  










<div class="container text-center">
    <h1 class="mb-5 fs-2 titre-h3 fw-bold"> All Courses Categories</h1>

    <div class="row justify-content-center">
        @foreach ($categories as $category)
          @if($category->nom!='others')
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="cont">
                    <div class="card-category">
                        <p class="title-category">{{$category->nom}}</p>
                        <div class="card-category-hidden">
                            <p class="title-category-in">{{$category->nom}}</p>
                            @if($category->nom!='data')
                            <img  style="width: 80px ; height: 80px ; display: block; margin: 0 auto;" src="{{$category->logo}}" alt=""> 
                           @else
                           <img  style="display: block; margin: 0 auto;" src="{{$category->logo}}" alt=""> 
                            @endif
                            <a class="button-category text-decoration-none" href="{{ route('categorycourses', ['category' => $category->id]) }}">Discover Courses</a>
                        </div>
                    </div>
                    <div class="card-category-border"></div>
                </div>
            </div>
            @else
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="cont">
                    <div class="card-category">
                        <p class="title-category">{{$category->nom}}</p>
                        <div class="card-category-hidden">
                            <p class="title-category-in">Card title</p>
                            <p>other categories</p>
                            <br><br>
                            <a class="button-category text-decoration-none" href="{{ route('categorycourses', ['category' => $category->id]) }}">Discover Courses</a>
                        </div>
                    </div>
                    <div class="card-category-border"></div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    


</div>
<!-- Share Course Modal -->
<div class="modal fade" id="shareCourseModal" tabindex="-1" role="dialog" aria-labelledby="shareCourseModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareCourseModalLabel">Share A Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="slide-form" id="slideForm1">
                    <form action="{{ route('course.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="courseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" name="courseTitle" id="courseTitle"
                                placeholder="Enter course title">
                        </div>
                        <div class="mb-3">
                            <label for="courseDescription" class="form-label">Course Description</label>
                            <textarea class="form-control" name="courseDescription" id="courseDescription" rows="3"
                                placeholder="Enter course description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="courseCategory" class="form-label">Course Category</label>
                            <select class="form-control" name="courseCategory" id="courseCategory">
                                @foreach($categories as $category)
                                    <option value="{{ $category->nom }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" name="create">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <!-- Add your footer buttons if needed -->
            </div>
        </div>
    </div>
</div>
<!-- End Share Course Modal -->





<script>
    function resetForm() {
        document.getElementById("courseTitle").value = "";
        document.getElementById("courseDescription").value = "";
        document.getElementById("courseCategory").selectedIndex = 0;
    }


 


    function showLessonForm(courseId) {
    $('#lessonModal-' + courseId).modal('show');
}

// Add event listener to form submission
document.querySelector('form').addEventListener('submit', function(event) {
    var fileInput = document.getElementById('lessonFile');
    var allowedExtensions = ['pdf', 'txt'];
    var allowedVideoExtensions = ['mp4', 'avi', 'mov']; // Add more video extensions if needed
    var maxFileSize = 300 * 1024 * 1024; // 300 MB

    if (fileInput.files.length > 0) {
        var fileName = fileInput.files[0].name;
        var fileExtension = fileName.split('.').pop().toLowerCase();

        if (fileInput.files[0].size > maxFileSize) {
            alert('File size exceeds the maximum limit of 300 MB.');
            event.preventDefault();
            return; // Stop form submission
        }

        var isValidFile = false;

        if (fileInput.accept === 'video/*') {
            isValidFile = allowedVideoExtensions.includes(fileExtension);
        } else {
            isValidFile = allowedExtensions.includes(fileExtension);
        }

        if (!isValidFile) {
            alert('Invalid file format. Only PDF, TXT, and video files are allowed.');
            event.preventDefault();
            return; // Stop form submission
        }
    }

    // If all validations pass, the form will be submitted automatically
});






</script>




@endsection