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
    {{-- =========================la partie title================================= --}}
 <div class="row mb-5" style="margin-top: 5%">
  <div class="container ">
    <div class="col-md-12 ">
      <div class="row  rounded" style="background-color: #7fb69e">
        <div class="col-6"><h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">Here is <br> all the projects  <br> reported. </h1>
       <div class="container">
      </div>
      </div>
        <div class="col-6"><img src="{{asset('Images/12285991_4898696.jpg')}}" class="img-fluid  rounded-corner" alt=""></div>
      </div>
    </div>
  </div>
</div>

    {{-- ============================================================================ --}}
    
    {{-- <h1>All the projects reported  </h1> --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <table class="table mt-5">
      <thead>
          <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Price</th>
              <th>Reporter username</th>
              
              <th>Report Description</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($projects as $project)
          <tr>
              <td>{{ $project->id }}</td>
              <td>{{ $project->title }}</td>
              <td>{{ $project->description }}</td>
              <td>{{ $project->prix }}</td>
              <td>{{ $project->username }}</td>
              <td>{{ $project->report_description }}</td>
              <td>
                <form action="{{route('projet.delete' ,['idprojet'=>$project->id])}}" method="POST">
                  @csrf
                  <button class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                      <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                  </button>
                </form>
          </td>
          </tr>
          @endforeach
      </tbody>
      
  </table>
  <br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="d-flex justify-content-center mt-5">
    {{ $projects->appends(['category' => request('category')])->links() }}
  </div>
  </main>
  
  
  
@endsection