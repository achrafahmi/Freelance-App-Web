@extends('layouts.app')
@section('content')


<div class="w3-content w3-margin-top" style="max-width:1400px;">

    <!-- The Grid -->
    <div class="w3-row-padding">
    
      <!-- Left Column -->
      <div class="w3-third">
      
        <div class="w3-white w3-text-grey w3-card-4">
          <div class="w3-display-container">
            <img src="{{asset('storage\/').$freelancer->image_path}}" style="width:150px;height:150px" alt="Avatar">
            
          </div>
         
            <h2>{{$freelancer->prenom}} {{$freelancer->nom}}</h2>
        
          <div class="w3-container mt-3">
            <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$freelancer->actual_job}}</p>
            <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>{{$freelancer->country}}</p>
            <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><a class="text-decoration-none" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$freelancer->email}}" target="_blank">{{$freelancer->email}}</a></p>
            <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>(+226){{$freelancer->phone_number}}</p>
            <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i><a class="text-decoration-none " href="{{ asset('storage\/').$freelancer->cv_path }}" target="_blank">View CV</a></p>
            <hr>
  
            <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Rate</b></p>
            {{-- <p>Rating</p>
            <div class="w3-light-grey w3-round-xlarge w3-small">
              <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">4.5/5</div>
            </div> --}}
            {{-- <div>
              <form action="{{ route('rating.create') }}" method="POST">
                @csrf
              <p>Leave a Rate</p>
              <div class = "con">   
                <i class = "fa fa-star" aria-hidden = "true" id = "st1"></i>  
               <i class = "fa fa-star" aria-hidden = "true" id = "st2"></i>  
               <i class = "fa fa-star" aria-hidden = "true" id = "st3"></i>  
               <i class = "fa fa-star" aria-hidden = "true" id = "st4"></i>  
               <i class = "fa fa-star" aria-hidden = "true" id = "st5"></i>  
               </div> 
              <br>
              <div>
                <label for="comment">Comment:</label><br>
                <textarea  rows="4" required></textarea>
              </div>
              <div>
                <button class="btn btn-success"  type="button">Submit</button>
              </div>
            </form>
            </div> --}}
            <div>
              <form action="{{ route('rating.create') }}" method="post">
                @csrf
                <p>Leave a Rate</p>
                <div class="con">
                  <i class="fa fa-star" aria-hidden="true" id="st1"></i>
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
                  <button class="btn " style="background-color: #009A8B" type="submit">Submit</button>
                </div>
              </form>
            </div>
          
            <br>
  
            
          </div>
        </div><br>
  
      <!-- End Left Column -->
      </div>
  
      <!-- Right Column -->
      <div class="w3-twothird">
      
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
          <div class="w3-container">
            <h5 class="w3-opacity"><b>{{$freelancer->actual_job}} </b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>date   <span class="w3-tag w3-teal w3-round">Current</span></h6>
            {{-- <p>Lorem ipsum dolor sit amet. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p> --}}
            <hr>
          </div>
          {{-- @foreach($freelancer->experiences as $experience)
          <div class="w3-container">
            <h5 class="w3-opacity"><b>{{$experience}}</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Mar 2012 - Dec 2014</h6>
            <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p>
            <hr>
          </div>
          @endforeach --}}
          @foreach(explode("\r\n", $freelancer->experiences[0]) as $experience)
          <div class="w3-container">
            <h5 class="w3-opacity"><b>{{ $experience }}</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{$freelancer->created_at}}</h6>
            {{-- <p>Consectetur adipisicing elit. Praesentium magnam consectetur vel in deserunt aspernatur est reprehenderit sunt hic. Nulla tempora soluta ea et odio, unde doloremque repellendus iure, iste.</p> --}}
            <hr>
          </div>
        @endforeach
        
          {{-- <div class="w3-container">
            <h5 class="w3-opacity"><b>Graphic Designer / designsomething.com</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Jun 2010 - Mar 2012</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><br>
          </div> --}}
        </div>
  
        <div class="w3-container w3-card w3-white">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
          @foreach(explode("\r\n", $freelancer->diplomas[0]) as $diploma)
          <div class="w3-container">
            <h5 class="w3-opacity"><b>{{$diploma}}</b></h5> 
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{$freelancer->created_at}}</h6>
            {{-- <p>Web Development! All I need to know in one place</p> --}}
            <hr>
          </div>
          @endforeach
          {{-- <div class="w3-container">
            <h5 class="w3-opacity"><b>London Business School</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2015</h6>
            <p>Master Degree</p>
            <hr>
          </div>
          <div class="w3-container">
            <h5 class="w3-opacity"><b>School of Coding</b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2010 - 2013</h6>
            <p>Bachelor Degree</p><br>
          </div> --}}
        </div>
        {{-- ======================================= --}}
        <!-- Some Opinions -->
<div class="w3-container w3-card w3-white mt-3">
  <h2 class="w3-text-grey w3-padding-16">
      <i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Some Opinions About {{$freelancer->prenom}} {{$freelancer->nom}}
  </h2>
  <div class="w3-container w3-section">
      @foreach($ratings as $rating) 
      <div class="w3-container w3-padding">
          <h5 class="w3-opacity"><b>{{$rating->user->username}} </b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>{{$rating->created_at}}</h6>
          <p>{{$rating->comment}}</p>
      </div>
      <hr>
      @endforeach
  </div>
</div>

  
      <!-- End Right Column -->
      </div>
      
    <!-- End Grid -->
    </div>
    
    <!-- End Page Container -->
  </div>






  <script src="javaScript/rating.js">
    
  </script>



@endsection