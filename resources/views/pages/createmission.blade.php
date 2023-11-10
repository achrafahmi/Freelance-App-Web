@extends('layouts.app')
@section('content')
 {{-- warning mssage --}}
<div class="container mt-5 mb-5">
  @if(session('successMessage'))
    <div class="alert alert-success" role="alert">
      {{ session('successMessage') }}
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  
{{-- end warning mssage --}}
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header fw-bold text-center" style="background-color: #7fb69e">create a project</div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <form class="row g-3" action="{{ route('project.create') }}" method="POST">
              @csrf 
              <div class="col-md-8">
                <label for="inputState" class="form-label">Category</label>
                <select id="inputState" name="category" class="form-select">
                  @foreach($categories as $category)
                  <option>{{$category->nom}}</option>
                  {{-- <option selected>business</option>
                  <option>data</option>
                  <option>graphics & design</option>
                  <option>lifestyle</option>
                  <option>music & audio</option>
                  <option>online marketing</option>
                  <option>photography</option>
                  <option>programming</option>
                  <option>video animation</option>
                  <option>writing & translation</option>
                  <option>other</option> --}}
                  @endforeach
                </select>
              </div>
              <div class="col-md-8">
                <label for="inputEmail4" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="inputEmail4">
              </div>
              <div class="col-md-8">
                <label for="inputSociety" class="form-label">The society</label>
                <input type="text" name="societe" class="form-control" id="inputSociety">
              </div>
              <div class="col-md-6">
                <label for="prix" class="form-label">Budget</label>
                <div class="input-group">
                  <input type="number" name="prix" class="form-control" id="prix" min="0">
                  <span class="input-group-text">$</span>
                </div>
              </div>
              <div class="col-12">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="inputDescription" placeholder="project description ..."></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary bg-success border border-success" name="submit">Submit</button>
                <button type="submit" class="btn btn-primary bg-danger border border-danger" name="exit">Exit</button>
              </div>
            </form>
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img src="{{ asset('Images/Cheerful guy earning money for his idea.jpg') }}" alt="Project Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection