@extends('layouts.app')
@section('content')
<div class="container">
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a class="text-decoration-none text-reset" href="/">Home</a></li>
      
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title --> 
  @if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="{{ asset('storage\/').$freelancer->image_path }}" alt="Profile" class="rounded-circle" style="width: 200px; height: 200px">
            <h2>{{$freelancer->prenom}} {{$freelancer->nom}}</h2> 
            <h3>{{$freelancer->actual_job}}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active text-success" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link text-success" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link text-success" data-bs-toggle="tab" data-bs-target="#profile-settings">Projects Annouces</button>
              </li>

              <li class="nav-item">
                <button class="nav-link text-success" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                {{-- <h4 class="card-title">About</h4>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> --}}

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{$freelancer->prenom}} {{$freelancer->nom}}</div>
                </div>

                {{-- <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                </div> --}}

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">{{$freelancer->actual_job}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">{{$freelancer->country}}</div>
                </div>

                {{-- <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                </div> --}}

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">(+226) {{$freelancer->phone_number}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{$freelancer->email}}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">
                 <a href="storage/{{$freelancer->cv_path}}" class="text-decoration-none text-black fw-bold">cv file</a> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Diplomas</div>
                  @foreach($freelancer->diplomas as $diploma)
                  <div class="col-lg-9 col-md-8">{{$diploma}} 
                  </div> <br>
                  @endforeach
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Experiences</div>
                  @foreach($freelancer->experiences as $experience)
                  <div class="col-lg-9 col-md-8">{{$experience}} 
                  </div> <br>
                  @endforeach
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{route('profil.edit')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                 <input type="hidden" name="idFreelancer" value="{{$freelancer->id}}">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      @if(empty($freelancer->image_path))
                      <img src="noprofile.jpg" alt="Profile">
                    @else
                      <img src="{{ asset('storage\/' . $freelancer->image_path) }}" alt="Profile" style="width:200px;height:200px" id="profileImage">
                    @endif
                      <div class="pt-2">
                        <input name="profileImage" type="file" class="btn btn-success btn-sm" title="Upload new profile image" style="display: none;" id="profileImageInput">
                        <label for="profileImageInput" class="btn btn-success btn-sm" title="Upload new profile image">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                        </label>

                        {{-- <button  class="btn btn-danger btn-sm" title="Remove my profile image">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </button> --}}
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="firstName" class="col-md-4 col-lg-3 col-form-label">Fist Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{$freelancer->prenom}}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="familyName" class="col-md-4 col-lg-3 col-form-label">Family Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="familyName" type="text" class="form-control" id="familyName" value="{{$freelancer->nom}}">
                    </div>
                  </div>
                  

                  <div class="row mb-3">
                    <label for="actualJob" class="col-md-4 col-lg-3 col-form-label">Actual Job</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="actualJob" type="text" class="form-control" id="actualJob" value="{{$freelancer->actual_job}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="country" value="{{$freelancer->country}}">
                    </div>
                  </div>

                  {{-- <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                    </div>
                  </div> --}}

                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="phone" value="{{$freelancer->phone_number}}">
                    </div>
                  </div>
                    
                  {{-- <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{$freelancer->email}}">
                    </div>
                  </div> --}}
                    
                  <div class="container">
                    <div class="col-md-12">
                      <div class="form-group mt-3">
                        <label for="diplomas">Diplomas:</label>
                        @foreach($freelancer->diplomas as $diploma)
                        <textarea class="form-control" name="diplomas[]" id="diplomas" rows="3">{{ $diploma }}</textarea>
                        @endforeach
                        <small class="form-text text-muted mt-3">Enter each diploma on a new line.</small>
                        <button type="button" class="btn btn-secondary mt-3" id="addDiplomaBtn">Add Diploma</button>
                        <button type="button" class="btn btn-danger mt-3" id="removeDiplomaBtn">Remove Diploma</button>
                      </div>
                    </div>
                  </div>
                
                  <div class="container">
                    <div class="col-md-12">
                      <div class="form-group mt-3">
                        <label for="experiences">Experiences:</label>
                        @foreach($freelancer->experiences as $experience)
                        <textarea class="form-control" name="experiences[]" id="experiences" rows="3">{{ $experience }}</textarea>
                        @endforeach
                        <small class="form-text text-muted mt-3">Enter each experience on a new line.</small>
                        <button type="button" class="btn btn-secondary mt-3" id="addExperienceBtn">Add Experience</button>
                        <button type="button" class="btn btn-danger mt-3" id="removeExperienceBtn">Remove Experience</button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <label for="cv" class="col-md-4 col-lg-3 col-form-label"><a class="text-decoration-none fw-bold" style="color :black"  href="storage/{{$freelancer->cv_path}}" target="_blank">CV</a> </label>
                    <div class="col-md-8 col-lg-9">
                     <input type="file" class="form-control">
                    </div>
                  </div>

                  

                  <div class="text-center">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Projects Form -->
                
                  @if($projects->isEmpty())
                    <p>No Announce has been created yet.</p>
                  @else

                 @foreach($projects as $project)
                 <form action="{{route('annonce.action')}}" method="POST">
                  @csrf
                    <div class="card text-center mt-3">
                        <div class="card-header">
                          <h3 class="card-title text-primary">{{ $project->title }}</h4>
                        </div>
                        <div class="card-body">
                          
                          <h6 class="card-subtitle mb-2 text-muted">{{ $project->societe }}</h6>
                          <p class="card-text">{{$project->description}}</p>
                          <p class="card-text"><strong>Budget:</strong> {{ $project->prix }} $</p>

                          <input type="hidden" name="idprojet" value="{{$project->id}}">
                          <div class="pt-2">
                            <button class="btn btn-success btn-sm" title="this offer is already taken" name="done">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                              </svg>
                            </button>
                            <button class="btn btn-danger btn-sm" title="Remove this anounce" name="delete">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                              <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                          </button>
                          </div>
                        </div>
                        <div class="card-footer text-body-secondary">
                          {{$project->created_at}}
                        </div>
                      </div>
                    </form>
                  @endforeach
                  
                @endif
                <!-- End annonces Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
              <!-- Change Password Form -->
<form id="changePasswordForm" action="{{ route('password.change') }}" method="POST">
  @csrf
  <div class="row mb-3">
    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
    <div class="col-md-8 col-lg-9">
      <input name="password" type="password" class="form-control" id="currentPassword">
    </div>
  </div>

  <div class="row mb-3">
    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
    <div class="col-md-8 col-lg-9">
      <input name="newpassword" type="password" class="form-control" id="newPassword">
      <span id="newPasswordError" class="error-text"></span> <!-- Error message placeholder -->
    </div>
  </div>

  <div class="row mb-3">
    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
    <div class="col-md-8 col-lg-9">
      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
      <span id="renewPasswordError" class="error-text"></span> <!-- Error message placeholder -->
    </div>
  </div>
  <input type="hidden" name="idFreelancer" value="{{$freelancer->id}}">
  <div class="text-center">
    <button type="submit" class="btn btn-success">Change Password</button>
  </div>
</form>
<!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
</div>



<script src="javaScript/changepasswd.js">
  
</script>
<script src="createprofile.js"></script>
<script>$(document).ready(function() {
  // Handle file input change event
  $('#profileImageInput').on('change', function() {
    var file = this.files[0];

    // Create a FileReader object
    var reader = new FileReader();

    // Set the image source when FileReader finishes loading the file
    reader.onload = function(e) {
      $('#profileImage').attr('src', e.target.result);
    };

    // Read the uploaded file as a data URL
    reader.readAsDataURL(file);
  });
});
</script>
<style>
  .error {
    border-color: red !important;
  }

  .error-text {
    color: red;
  }
</style>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection