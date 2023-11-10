@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

 

    <div class="row">
        <div class="col-md-3 rounded p-3 side-bar-annonces" >
            <nav>
                <ul class="mcd-menu list-unstyled">
                    <!-- Sidebar content here -->
                    @foreach ($categories as $category)
                        <li>
                            <div class="container overflow-hidden text-center">
                                <div class="row gx-5">
                                    <div class="col">
                                        <div class="p-3">
                                            <a class="text-decoration-none " href="{{ route('annonces', ['category' => $category->nom]) }}">
                                              <button class="text-white"> <h4><strong>{{ $category->nom }}</strong></h4></button> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="col-md-9">
            <!-- Right-side content here -->
            {{-- <div class="d-flex justify-content-center "><h5 class="title-important">Discover The Latest Offers Of The Category : {{request('category')}} </h5></div> --}}
            {{-- =========================la partie title================================= --}}
 <div class="row ">
    <div class="container ">
      <div class="col-md-12 ">
        <div class="row  rounded" style="background-color: #7fb69e">
          <div class="col-6"><h1 style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><div class="font-weight-bold text-white mt-3" > Discover</div> The Latest project <br> Of The Category <div class="font-weight-bold text-white mt-3" >{{request('category')}}. </div></h1>
         <div class="container">
        </div>
        </div>
          <div class="col-6"><img src="Images/7938249_3696303.jpg" class="img-fluid  rounded-corner" alt=""></div>
        </div>
      </div>
    </div>
  </div>
  
      {{-- ============================================================================ --}}
            @foreach($projets as $projet)
                
            <div class="container ">
                <div class="poster col-md-12 mt-5">
                    <div class="dropdown-container">
                        {{-- Dropdown --}}
                        <div class="dropdown">
                            <div class="btn btn-outline-dark border-0" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path
                                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                                </svg>
                     
                            </div>
                            <ul class="dropdown-menu">
                                <li>
                                    <button class="dropdown-item" type="button">
                                        <a class="text-reset text-decoration-none"
                                            href="https://mail.google.com/mail/?view=cm&fs=1&to={{$projet->owner->email}}"
                                            target="_blank">
                                            Contact
                                        </a>
                                    </button>
                                </li>
                                <li><button class="dropdown-item" type="button" onclick="openForm({{ $projet->id }})">Repport</button></li>
                                {{-- <li><button class="dropdown-item" type="button" onclick="openForm()">Repport</button></li> --}}
                
                            </ul>
                        </div>
                        {{-- End of Dropdown --}}
                    </div>
                    <h3 class="poster__title">{{ $projet->title }}</h3>
                    <div class="poster__date">
                        {{$projet->societe}}
                    </div>
                    <p class="poster__content">{{ $projet->description }}</p>
                     <div class="fw-bolder">Budget: {{$projet->prix}} $</div>
                    <div class="poster__date">
                        {{$projet->created_at}}
                    </div>
                    <div class="poster__date">
                        Owner Gmail:<a class="text-decoration-none text-secondary" href="https://mail.google.com/mail/?view=cm&fs=1&to={{$projet->owner->email}}" target="_blank"> {{ $projet->owner->email }}</a>
                    </div>
                   
                    <div class="poster__arrow">
                        <a  href="https://mail.google.com/mail/?view=cm&fs=1&to={{$projet->owner->email}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                            <path fill="#fff"
                                d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
                        </svg>
                        </a>
                    </div>
                </div>
                
                </div>






                {{-- Popup Form --}}
            <div id="popup-{{ $projet->id }}" class="popup">
                <div class="popup-content">
                    <span class="popup-close" onclick="closeForm({{ $projet->id }})">X</span>
                    <h2>Report</h2>
                    <!-- Add your form fields here -->

                    <form action="{{ route('repport.create') }}" method="POST">
                        @csrf
                        <div class="form-outline">
                            <label class="form-label" for="description">What's your report?</label>
                            <textarea class="form-control" name="description" id="textAreaExample1" rows="4"></textarea>
                        </div>
                        <br>
                        <input type="hidden" name="idProject" value="{{ $projet->id }}">
                        <input type="hidden" name="idRepporter" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>

                </div>
            </div>

            {{-- End of Popup Form --}}
            @endforeach
        </div>
        
        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $projets->appends(['category' => request('category')])->links() }}
        </div>
        {{-- End of Pagination --}}
        
    </div>







<script src="javaScript/formpopup.js"></script>
@endsection
   
