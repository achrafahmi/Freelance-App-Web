@extends('layouts.app')
@section('content')
<div class="container text-center">
{{-- The courses the category choosed --}}
{{-- @if($courses->isEmpty())
    <h2 class="fs-2 titre-h3 fw-bold">No courses shared yet for this category.</h2>
@else
@foreach ($courses as $course)
    @php
        $category = $course->categoryName;
    @endphp
    <h2 class="fs-2 titre-h3 fw-bold">Shared courses of the Category: {{ $category }}</h2>
@endforeach --}}
@if ($courses->isEmpty())
    <h2 class="fs-2 titre-h3 fw-bold">No courses shared yet for this category.</h2>
@else
    @php
        $category = $courses->first()->categoryName;
    @endphp
    <h2 class="fs-2 titre-h3 fw-bold">Shared courses of the Category: {{ $category }}</h2>


    <div class="container">
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-3">
                    <div class="course-card">
                        <div class="course-header">
                            <span class="course-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <p class="course-alert">{{$course->title}}</p>
                        </div>
                        <p class="course-message">
                            {{$course->description}}
                        </p>
                        <strong>{{$course->categoryName}}</strong>
                        <div>
                            @php
                                                              $rating = $course->averageRating;
                                                              $fullStars = floor($rating);
                                                              $halfStar = ($rating - $fullStars) >= 0.5;
                                                              $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                                          @endphp
                                                          @for ($i = 0; $i < $fullStars; $i++)
                                                              <i class="fa fa-star text-warning"></i>
                                                          @endfor
                                                          @if ($halfStar)
                                                              <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                                          @endif
                                                          @for ($i = 0; $i < $emptyStars; $i++)
                                                              <i class="fa fa-star-o text-warning"></i>
                                                          @endfor
                        </div>
                        <div class="course-actions">
                            <a class="course-read" href="{{ route('courselessons', ['courseId' => $course->id]) }}">
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
<br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
{{-- end of courses the category choosed --}}




