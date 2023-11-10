 <link rel="stylesheet" href="{{asset('admindashboard.css')}}">
@extends('layouts.app')

@section('content')
    <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admindashboard') }}">
        
        <span>Admin Dashboard</span>   {{-- <i class="fa-regular fa-house"></i> --}}
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin-projectsrepported') }}">
        
        <span>{{--<i class="fa-regular fa-circle-exclamation"></i>--}}Projects Repported</span>
      </a>
    </li><!-- End Profile Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin-usersregistered') }}">
     
         <span>{{--<i class="fa-light fa-users"></i>--}} Users Registered Stats</span> 
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin-projectsstats') }}">
       
        <span>{{--<i class="fa-solid fa-chart-line-up"></i>--}}Projects Creating Stats</span>
      </a>
    </li>
    
  </ul>
</aside><!-- End Sidebar-->
<div class="container">
  <main id="main" class="main">
    <h1>Welcome to admin dashboard </h1>
<img src="{{asset('Images/12849227_11_Success-1.jpg')}}" alt="">



    
  </main>
</div> 
  
  
@endsection