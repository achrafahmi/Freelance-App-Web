<link rel="stylesheet" href="{{asset('admindashboard.css')}}">
@extends('layouts.app')

@section('content')
    <!-- ======= Sidebar ======= -->
    
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
    
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('admindashboard')}}">
                 
                  <span>Admin Dashboard</span>
                </a>
              </li>
    
    
          
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin-projectsrepported')}}">
              
              <span>Projects Repported</span>
            </a>
          </li><!-- End Profile Page Nav -->
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin-usersregistered')}}">
              
              <span>Users Registered Stats </span>
            </a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin-projectsstats')}}">
              
              <span>Projects Creating Stats </span>
            </a>
          </li>
        </ul> 
    
      </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <div class="container">
    <h1>This diagram shows the projects created in the last 5 days</h1>
    <canvas id="projectChart"></canvas>
    <br><br>
    
    <h1>Here is the projects created Today : </h1>
    @if($projectsToday->isEmpty())
    <p>No projects has been created yet for today.</p>
    @else
    @foreach ($projectsToday as $project)
    <div class="card text-center mt-3">
      <div class="card-header">
        <h3 class="card-title text-primary">{{ $project->title }}</h4>
      </div>
      <div class="card-body">
        
        <h6 class="card-subtitle mb-2 text-muted">{{ $project->societe }}</h6>
        <p class="card-text">{{$project->description}}</p>
        <p class="card-text"><strong>Budget:</strong> {{ $project->prix }} $</p>
        <div class="pt-2">
          
        </div>
      </div>
      <div class="card-footer text-body-secondary">
        {{$project->created_at}}
      </div>
    </div>
    @endforeach
    @endif
  </div>
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>

    const ctx = document.getElementById('projectChart').getContext('2d');
    
    
    const projectCounts = @json($projectCounts);
    
    
    const days = projectCounts.map(project => project.date);
    const counts = projectCounts.map(project => project.count);
   
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: days,
        datasets: [{
          label: 'Projects Created',
          data: counts,
          backgroundColor: 'rgba(75, 192, 192, 0.6)', 
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  
@endsection