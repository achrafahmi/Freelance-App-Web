@extends('layouts.app')
@section('content')

<div class="container d-flex justify-content-center flex-column container-fluid"  >
    <div class="row">
        <div class="col-md-6">
            <div class="row">
           <h1 class="home-title mt-11 pt-4 mb-5" style="margin-top : 50px; font-family :Arial, Helvetica, sans-serif; font-weight: 800;">Welcome to {{config('app.name', 'RadarJob') }} <br> where the job <br> finds you .</h1>
        </div>
        @if (!$hasProfile)
        <div class="row ">
            <form class="container-fluid justify-content-start" style="margin-top :50px ">
                                  
                <button class="btn btn-outline-success m-2" type="button" style="display: inline-flex ; background-color:#f85a40 ; font-weight :bold ">
                     
                 <a href="{{ auth()->check() ? route('addprofile') : route('login') }}" class="text-dark text-primary" style=" text-decoration: none">Add your profile</a>  <span class="material-symbols-outlined">send  </span></button>
                  
              </form>
        </div>
        @endif
        </div>
        <div class="col-md-6" >
            <img src="5.png" >
        </div>
    </div>
    
    {{-- =========================la partie learn more================================= --}}
<div class="row mt-5">
  <div class="container ">
    <div class="col-md-12 ">
      <div class="row  rounded" style="background-color: #7fb69e">
        <div class="col-6"><h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><div class="font-weight-bold text-white mt-3" > This is how</div> good companies find <br> good Company .</h1>
       <div class="container"> <ul class="list-unstyled">
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
          </svg> We connect companies with top-quality freelancers.</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
          </svg> Tap into a pool of talented and experienced professionals.</li>
          <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg> Find the right talent for your project easily.</li>
        </ul>
      </div>
       <a href="{{Route('learnmore')}}" class="mx-auto"> <button type="button" class="btn btn-info mt-5">learn more</button></a>
      </div>
        <div class="col-6"><img src="Images/wokFhome.jpg" class="img-fluid  rounded-corner" alt=""></div>
      </div>
    </div>
  </div>
</div>

    {{-- ============================================================================ --}}
    <div class="row" style="margin-top: 50px">
        <div class="col-12">
            <div class="row">
                <div class="col text-center my-5">
                  <div class="fs-2 titre-h3 fw-bold" style="font-weight: 500px">The Best Freelancers</div>
                    <p class="mt-5">Our team of top-rated freelancers boasts some of the most experienced and highly skilled professionals in the industry. With years of experience in their respective fields, our freelancers are well-equipped to tackle a wide range of projects, from web development and graphic design to content creation and marketing. Their expertise is unmatched, and they consistently deliver high-quality work that exceeds expectations. Our best freelancers are dedicated to providing our clients with outstanding service and unparalleled results, making them an invaluable asset to our team and our clients.</p>
                  </div>
                </div>
                 {{-- swiper --}}
                <div class="container-fluid">
                  <!-- Slider main container -->
                  <div class="swiper">
                      <!-- Additional required wrapper -->
                      <div class="swiper-wrapper">
                          <!-- Slides -->
                          @foreach ($bestFreelancers as $bestFreelancer)
                              <div class="swiper-slide">
                                  {{-- profile 1 --}}
                                  <section class="main-content">
                                      <div class="container">
                                          <div class="row">
                                              <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                                                  {{-- profile card --}}
                                                  <div class="profile-card card rounded-lg shadow p-4 p-xl-5 mb-4 text-center">
                                                    {{-- ====> --}}
                                                      <div class="banner">{{-- ====> --}}
                                                      </div>
                                                      @if(empty($bestFreelancer->image_path))
                                                        <img src="noprofile.jpg" alt="Profile Picture" class="profile-picture">
                                                      @else
                                                        <img class="rounded-circle" src="{{ asset('storage/'.$bestFreelancer->image_path) }}" alt="Profile Picture" class="profile-picture">
                                                      @endif
                                                      <h3 class="mb-4">{{ $bestFreelancer->prenom }} {{ $bestFreelancer->nom }}</h3>
                                                      <div class="text-left mb-4">
                                                        <p class="mb-2 text-center">
                                                          @php
                                                              $rating = $bestFreelancer->rate;
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
                                                      </p>
                                                      
                                                          <p class="mb-2 text-center"><i class="fa fa-envelope mr-2"></i> {{ htmlspecialchars($bestFreelancer->email) }}</p>
                                                          <p class="mb-2 text-center"><i class="fa fa-phone mr-2"></i> +212{{ htmlspecialchars($bestFreelancer->phone_number) }}</p>
                                                          <p class="mb-2 text-center">      
                                                              <i class="fa-solid fa-location-dot"></i>
                                                              {{$bestFreelancer->country}} 
                                                          </p>
                                                          
                                                            
                                                        </div>
                                                     
                                                     <a class="text-decoration-none " style="color :black"  href="{{ auth()->check() ? route('bestfreelancer', ['freelancer' => $bestFreelancer->id]) : route('login') }}">
                                                          <button type="button" class="btn fw-bold" style="background-color: #009A8B">View Profile</button>
                                                      </a>
                                                  </div>
                                                 
                                              </div>
                                               
                                          </div>
                                      </div>
                                  </section>
                              </div>
                              
                          @endforeach
                          {{-- other freelancers  --}}
                          <div class="swiper-slide">
                            <div class="d-flex justify-content-center align-items-center" style="height: 100%;">
                                <a class="mt-5 text-decoration-none" style="color :black" href="{{ auth()->check() ? route('allfreelancers') : route('login') }}">
                                    <button type="button" class="btn fw-bold" style="background-color: #009A8B">More Freelancers</button>
                                </a>
                            </div>
                        </div>
                              {{-- end other freelancers --}}
                      </div>
                      
                      <!-- If we need pagination -->
                      <div class="swiper-pagination"></div>
              
                      <!-- If we need navigation buttons -->
                      <div class="swiper-button-prev"></div>
                      <div class="swiper-button-next"></div>

                      <!-- If we need scrollbar -->
                      {{-- <div class="swiper-scrollbar"></div> --}}
                  </div>
              </div>
           
        {{-- end of the swiper --}}
        </div>
        
    </div>
    {{-- ===================================================================================
        =================================================================================== --}}
        <div class="row">
            <div class="col text-center my-5">
              <div class="fs-2 titre-h3 fw-bold" style="font-weight: 500px">
                Discover The Latest Projects
              </div>
               <p class="mt-5">Welcome to our exciting showcase of the latest projects! We are thrilled to present a diverse range of innovative and cutting-edge endeavors that push the boundaries of technology, creativity, and problem-solving. From groundbreaking research and development to captivating works of art, our collection embodies the spirit of innovation and showcases the talents of our brilliant contributors. Explore the projects below and be inspired by the remarkable ideas and accomplishments on display.</p>
            </div>
        </div>


        <div class="col-12 container" >
          <div class="row justify-content-center">
            @foreach($categories as $category)
            @if($category->nom!='others')
            <div class="col-md-3 mb-5">
              <div class="home-category-card">
                <div class="home-category-card-details text-center">
                  <p class="home-category-text-title">{{$category->nom}}</p>
                  @if($category->nom!='data')
                  <img class="home-category-card-img" src="{{$category->logo}}" alt="">
                  @else
                  <img  style="display: block; margin: 0 auto;" src="{{$category->logo}}" alt=""> 
                  @endif
                </div>
                <a class="home-category-card-button text-decoration-none text-center fw-5" href="{{ auth()->check() ? route('annonces', ['category' => $category->nom]) : route('login') }} ">Projects</a>
              </div>
            </div>
            @else
            <div class="col-md-3 mb-5">
              <div class="home-category-card">
                <div class="home-category-card-details">
                  <p class="home-category-text-title">{{$category->nom}}</p>
                  
                  {{-- <img class="home-category-card-img" src="{{$category->logo}}" alt=""> --}}
                </div>
                <a class="home-category-card-button text-decoration-none text-center fw-5" href="{{ auth()->check() ? route('annonces', ['category' => $category->nom]) : route('login') }}">Projects</a>
              </div>
            </div>
            @endif
            @endforeach
          </div>
</div>

 {{-- =========================la partie improve your skills ================================= --}}
 <div class="row mt-5">
  <div class="container ">
    <div class="col-md-12 ">
      <div class="row  rounded" style="background-color: #aBcd">
        <div class="col-6"><h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><div class="font-weight-bold text-white mt-3" > Improve </div>Your Talent .  </h1>
       <div class="container"> <ul class="list-unstyled">
          <li><i class="fa-solid fa-list"> </i>&nbsp Consult the categories .</li>
          <li><i class="fa-solid fa-book"> </i>&nbsp Choose a course .</li>
          <li><i class="fa-solid fa-share-nodes"> </i> &nbsp Share a course .</li>
        </ul>
      </div>
       <a href="{{auth()->check() ? Route('courses') : Route('login')}}" class="mx-auto"> <button type="button" class="btn mt-5 fw-5" style="background-color: #f85a40">Discover</button></a>
      </div>
        <div class="col-6"><img src="Images/blog-3.jpg" class="img-fluid  rounded-corner" alt=""></div>
      </div>
    </div>
  </div>
</div>

    {{-- ============================================================================ --}}







</div>




  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="web.js"></script>
@endsection
