@extends('layouts.app')
@section('content')



  

<!-- ======= Hero Section ======= -->
<section id="hero" class="clearfix">
  <div class="container" data-aos="fade-up">

    <div class="hero-img" data-aos="zoom-out" data-aos-delay="200">
      <img src="assets/img/hero-img.svg" alt="" class="img-fluid">
    </div>
{{-- The part i want to change --}}
<div class="row">
  <div class="col-md-6">
      <div class="row">
     <h1 class="home-title mt-11 pt-4 mb-5" style="margin-top : 50px; font-family :Arial, Helvetica, sans-serif; font-weight: 800;"> <span > We provide</span><br><span>solutions</span><br>for your business!</h1>
  </div>
  <div class="row ">
     
  </div>
  </div>
  <div class="col-md-6" >
      <img src="about-extra-2.svg" >
  </div>
</div>
{{-- end of it --}}
  </div>
</section><!-- End Hero Section -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about">
    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <div class="text-center" >
        <div class="fs-2 titre-h3 fw-bold">About Us</div>
       </div>
        <p class="mt-3">    At {{config('app.name', 'RadarJob') }}, we are passionate about connecting talented freelancers with clients who need their skills. Our platform is designed to simplify the process of finding and hiring freelancers, making it easier for businesses and individuals to get their projects done efficiently..</p>
      </header>

      <div class="row about-container">

        <div class="col-lg-6 content order-lg-1 order-2">
          
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bi bi-card-checklist"></i></div>
            <h5 class="title fw-bold">Our Mission:</h5>
            <p class="description">We strive to empower freelancers and provide them with a platform where they can showcase their expertise, expand their professional network, and find meaningful projects. Simultaneously, we aim to assist clients in finding the perfect freelancers for their specific needs, ensuring successful collaborations and project outcomes.</p>
            <ul class="list-unstyled font-weight-bold">
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                  <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                </svg>
                create your profile
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                define your skills
              </li>
              <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                find the right project
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-6 background order-lg-2" data-aos="zoom-in">
          <img src="about-img.svg" class="img-fluid" alt="">
        </div>
      </div>

      <div class="row about-extra">
        <div class="col-lg-6" data-aos="fade-right">
          <img src="about-extra-1.svg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-5 pt-lg-0" data-aos="fade-left">
          <h5 class="title fw-bold"> How to find the right talente .</h5>
          <p>
            At {{config('app.name', 'RadarJob') }}, we understand the challenges faced by businesses and individuals when it comes to finding the right skills for their projects. We have built a platform that acts as a jetpack, propelling you over the skills gap and connecting you with the talented freelancers you need.
          </p>
          <ul class="list-unstyled font-weight-bold">
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
              </svg>
              Register
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
              Create you project anounce
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
              </svg>
              See the best freelancers 
            </li>
            <li>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
              </svg>
              Search a freelancer
            </li>
          </ul>
        </div>
      </div>

      

    </div>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="section-bg">
    <div class="container" data-aos="fade-up">
  
      <header class="section-header mt-5">
        <div class="text-center">
          <div class="fs-2 titre-h3 fw-bold">Services</div>
        </div>
  
        <p>Explore our comprehensive range of high-quality services designed to meet your needs. From web development and graphic design to content writing and digital marketing, our team of skilled professionals is here to deliver exceptional results. Whether you're a business owner, entrepreneur, or individual seeking top-notch freelancers, we've got you covered. Discover the power of our services and unlock new opportunities for success.</p>
      </header>
  
      <div class="row justify-content-center">
  
        <div class="col-lg-6 mb-4">
          <div class="card" style="background-color: #7fb69e" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-body">
              <h4 class="card-title">Adding a profile</h4>
              <p class="card-text">Unleash your skills and stand out.</p>
              <a class="btn font-weight-bold" style="background-color: #f85a40;" href="{{auth()->check() ? route('addprofile') : route('login')}}">Discover</a>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-4">
          <div class="card" style="background-color: #7fb69e" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-body">
              <h4 class="card-title">Creating a project announce</h4>
              <p class="card-text">Showcase your projects and find the perfect match.</p>
              <a class="btn font-weight-bold" style="background-color: #f85a40;" href="{{auth()->check() ? route('createmission') : route('login')}}">Discover</a>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-4">
          <div class="card" style="background-color: #7fb69e" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-body">
              <h4 class="card-title">Discover the latest projects</h4>
              <p class="card-text">Explore exciting opportunities and expand your freelance career.</p>
              <a class="btn font-weight-bold" style="background-color: #f85a40;" href="{{route('home')}}">Discover</a>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-4">
          <div class="card" style="background-color: #7fb69e" data-aos="zoom-in" data-aos-delay="100">
            <div class="card-body">
              <h4 class="card-title">Search for a freelancer</h4>
              <p class="card-text">Find the perfect freelancer for your projects and collaborations.</p>
              <a class="btn font-weight-bold" style="background-color: #f85a40;" href="{{Auth()->check() ?  route('home') : route('login')}}">Discover</a>
            </div>
          </div>
        </div>
  
      </div>
  
    </div>
  </section>
  
  <!-- End Services Section --> 

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="mt-5">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <div class="text-center">
          <div class="fs-2 titre-h3 fw-bold">Why choose us?</div>
        </div>
        <p>Discover the reasons why we're the perfect choice for your freelance needs. With our exceptional talent, seamless collaboration, and diverse range of services, we're committed to delivering outstanding results. Join our platform and experience the difference today.</p>
      </header>
  
      <div class="row row-eq-height justify-content-center">
        <div class="col-lg-4 col-md-6">
          <div class="why-us-item" data-aos="zoom-in" data-aos-delay="100">
            <i class="bi bi-award"></i>
            <h4>Exceptional Talent</h4>
            <p>We have a pool of highly skilled freelancers ready to take on your projects.</p>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-6">
          <div class="why-us-item" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi bi-people"></i>
            <h4>Seamless Collaboration</h4>
            <p>Our platform ensures smooth communication and efficient project management.</p>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-6">
          <div class="why-us-item" data-aos="zoom-in" data-aos-delay="300">
            <i class="bi bi-layers"></i>
            <h4>Diverse Services</h4>
            <p>From web development to graphic design, we offer a wide range of freelance services.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- =======End Why Us Section ======= -->
@endsection





