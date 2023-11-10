@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<div class="container">
@if($lessons->isEmpty())
    <h2>No lessons shared yet for this course.</h2>
@else
    <h2 class="fs-2 titre-h3 fw-bold " style="text-align: center;" >The lessons of this course </h2>
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
                            <form action="{{route('deletelesson')}}" method="POST">
                                @csrf
                                <input type="hidden" name="idLesson" value="{{$lesson->id}}">
                            <button class="course-mark-as-read" href="" >
                                Delete This Lesson
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
</div>

@endsection
