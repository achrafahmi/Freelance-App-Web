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
    <h1>The evolution of users registered in the last month:</h1>
    <div>
        <canvas id="userChart"></canvas>
    </div>
    <br><br> 
     {{-- =========================la partie title================================= --}}
 <div class="row ">
  <div class="container ">
    <div class="col-md-12 ">
      <div class="row  rounded" style="background-color: #7fb69e">
        <div class="col-6"><h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><div class="font-weight-bold text-white mt-3" > Discover</div> The Latest Registered <br> Users . </h1>
       <div class="container">
      </div>
      </div>
        <div class="col-6"><img src="{{asset('Images/12150863_4923108.jpg')}}" class="img-fluid  rounded-corner" alt=""></div>
      </div>
    </div>
  </div>
</div>

    {{-- ============================================================================ --}}
    
    

    <br><br>
    <h1> The users : </h1> <br>
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

    <table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Email</th>
              <th>Created At </th>
              <th>Delete</th>
              <th>Block</th>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
          <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->nom }}</td>
              <td>{{ $user->prenom }}</td>
              <td>{{ $user->email }}</td>
              <td>{{$user->created_at}}</td>
              <td>
                <form action="{{route('user.delete',['iduser'=>$user->id])}}" method="POST">
                  @csrf
                  <button  class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                  </button>
                </form>
              </td>
              <td>
                <form action="{{route('user.block',['iduser'=>$user->id])}}" method="post">
                  @csrf
                  <button class="btn btn-secondary" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                      <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                    </svg>              
                  </button>
                </form>
              </td>
              
          </tr>
          @endforeach
      </tbody>
  </table>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var userData = {!! json_encode($userData) !!};
    var labels = userData.map(item => item.date);
    var values = userData.map(item => item.count);
    var ctx = document.getElementById('userChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Registered Users',
                data: values,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>

  
@endsection