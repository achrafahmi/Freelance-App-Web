@extends('layouts.app')
@section('content')
<!-- Search Bar -->
<div class="search-bar float-right">
    <form class="search-form d-flex align-items-center" action="{{ route('freelancers.search') }}" method="POST">
        @csrf
        {{-- <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search" title="Enter search keyword">
            <button type="submit" class="btn btn-success" title="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div> --}}
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


<div class="container mt-5">
    <div class="row justify-content-center">
      @foreach($freelancers as $freelancer)
      <div class="col-md-4">
        <div class="card-client mb-3">
          <div class="user-picture">
            @if(empty($freelancer->image_path))
             <img src="noprofile.jpg" alt="Profile Picture" class="profile-picture">
            @else
             <img src="{{ asset('storage/'.$freelancer->image_path) }}" alt="Profile Picture" class="profile-picture">
            @endif

          </div>
          <p class="name-client">{{$freelancer->prenom}} {{$freelancer->nom}}
            <span>{{$freelancer->actual_job}}</span>
          </p>
         
          <div class="social-media justify-content-center">
            <ul class="list-unstyled">
              <li >Location: {{$freelancer->country}}</li>
              <li >Email: <a class="text-decoration-none text-secondary" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$freelancer->email}}" target="_blank">{{$freelancer->email}}</a></li>
              <li >Phone: <br> +226 {{$freelancer->phone_number}}</li>
              <li class=" d-flex justify-content-center align-items-center">
                <a  class="text-decoration-none" href="{{ auth()->check() ? route('bestfreelancer', ['freelancer' => $freelancer->id]) : route('login') }}">
                  <button >
                    <p class="m-0">View Profil</p>
                    <svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                      <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
                    </svg>
                  </button> 
                </a>
              </li>
            </ul>
          </div> 
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">
      {{ $freelancers->appends(['freelancer' => request('freelancer')])->links() }}
    </div>
  </div>
  
  
    {{-- <div class="row">
        @foreach($freelancers as $freelancer)
        <div class="col-md-4">
            <div class="profile-container profile-card mt-3">
                <div class="card-body profile-body">
                    <div class="profile-picture-container">
                        <img src="testimonials/testimonials-4.jpg" alt="Profile Picture" class="profile-picture">
                    </div>
                    <h5 class="card-title profile-name">{{$freelancer->prenom}} {{$freelancer->nom}}</h5>
                    <p class="card-text profile-role">{{$freelancer->actual_job}}</p>
                    <ul class="list-group profile-details">
                        <li class="list-group-item profile-detail">Location: {{$freelancer->country}}</li>
                        <li class="list-group-item profile-detail ">Email: </i><a class="text-decoration-none text-secondary" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$freelancer->email}}" target="_blank">{{$freelancer->email}}</a></li>
                        <li class="list-group-item profile-detail">Phone: +226 {{$freelancer->phone_number}}</li>
                        <li class="list-group-item profile-detail d-flex justify-content-center align-items-center">
                            <a class="text-decoration-none" href="{{ auth()->check() ? route('bestfreelancer', ['freelancer' => $freelancer->id]) : route('login') }}">
                              <button class="btn">
                                <p class="m-0">View Profil</p>
                                <svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
                                </svg>
                              </button> 
                            </a>
                          </li>
                          
                    </ul> --}}
                    {{-- <div>
                        <form action="{{ route('rating.create') }}" method="post">
                            @csrf
                            <p>Leave a Rate</p>
                            <div class="con"> --}}
                                
                                    {{-- <i class="fa fa-star far" aria-hidden="true" id="star_{{$freelancer->id}}_1"></i>
                                    <i class="fa fa-star far" aria-hidden="true" id="star_{{$freelancer->id}}_2"></i>
                                    <i class="fa fa-star far" aria-hidden="true" id="star_{{$freelancer->id}}_3"></i>
                                    <i class="fa fa-star far" aria-hidden="true" id="star_{{$freelancer->id}}_4"></i>
                                    <i class="fa fa-star far" aria-hidden="true" id="star_{{$freelancer->id}}_5"></i> --}}
                               
                                
                                {{-- <i class="fa fa-star" aria-hidden="true" id="st1"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st2"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st3"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st4"></i>
                                <i class="fa fa-star" aria-hidden="true" id="st5"></i>
                            </div>
                            <div>
                                <input type="hidden" name="freelancerId" value="{{$freelancer->id}}">
                            </div>
                            <br>
                            <div>
                                <label for="comment">Comment:</label><br>
                                <textarea name="comment" rows="4" required></textarea>
                            </div>
                            <input type="hidden" name="rating" id="rating" value="0">
                            <div>
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                        </form>
                    </div> --}}
                {{-- </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $freelancers->appends(['freelancer' => request('freelancer')])->links() }}
    </div>
</div> --}}
{{-- =========================la partie learn more================================= --}}
{{-- <div class="container">
    <div class="row mt-5">
        <div class="container ">
          <div class="col-md-12 ">
            <div class="row  rounded" style="background-color: #7fb69e">
              <div class="col-6"><h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><div class="font-weight-bold text-white mt-3" > Find </div> the best talented <br> freelancers .</h1>
            </div>
              <div class="col-6"><img src="pexels-mateusz-dach-450035.jpg" class="img-fluid  rounded-corner" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </div>  --}}
          {{-- ============================================================================ --}}
{{-- <script src="rating.js"></script> --}}

@endsection
