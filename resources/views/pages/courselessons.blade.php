@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container d-flex justify-content-end mt-2">
    <div class="rating-section">
      <strong >share your opinion </strong>
        <form action="{{ route('createcourserating') }}" method="post" class="mt-3">
            @csrf
            <div class="con">
                <i class="fa fa-star" aria-hidden="true" id="st1"></i>
                <i class="fa fa-star" aria-hidden="true" id="st2"></i>
                <i class="fa fa-star" aria-hidden="true" id="st3"></i>
                <i class="fa fa-star" aria-hidden="true" id="st4"></i>
                <i class="fa fa-star" aria-hidden="true" id="st5"></i>
            </div>
            <input type="hidden" name="rating_course" id="rating_course" value="0">
            <input type="hidden" name="IdCreateur" value="{{Auth::user()->id}}">
            <input type="hidden" name="IdCourse" value="{{$idcourse}}">
            <button class="btn mt-3" type="submit" style="background-color:#00838d ">Submit</button>
        </form>
    </div>
</div>

<div class="container">
@if($lessons->isEmpty())
    <h2>No lessons shared yet for this course.</h2>
@else
    <h2 class="fs-2 titre-h3 fw-bold " style="text-align: center;" >The lessons of the course</h2>
    <div class="container">
        <div class="row">
            @foreach($lessons as $lesson)
                <div class="col-md-3">
                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <p class="course-alert">{{$lesson->title}}</p>
                        </div>
                        <p class="course-message">
                            {{$lesson->description}}
                        </p>
                        <strong>{{$lesson->type}}</strong>
                        <div class="course-actions">
                            <a class="course-read" href="storage/{{$lesson->content_path}}">
                                Take a Look
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
</div>
<script>
$(document).ready(function() {
    $(".fa-star").click(function() {
        var starId = $(this).attr('id');
        var rating = parseInt(starId.substr(2));
        $("#rating_course").val(rating);

        $(".fa-star").css("color", "black");
        $("#" + starId).prevAll().addBack().css("color", "yellow");
    });
});
</script>
@endsection
