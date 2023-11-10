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
<div class="container mb-5">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header  text-white text-center" style="background-color: #7fb69e">Create Your Profile</div>
      <div class="card-body">
        <form class="row g-3" action="{{ route('freelancer.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3">
                <div class="img-container">
                  <img class="rounded-circle" id="profileImage" src="Images/noprofile.jpg" alt="">
                </div>
                <div>
                  <input type="file" name="profile" id="profile" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-12 flex-column align-items-center justify-content-center">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="firstname">
                  </div>
                  <div class="col-md-12 flex-column align-items-center justify-content-center">
                    <label for="familyname" class="form-label">Family Name</label>
                    <input type="text" class="form-control" name="familyname" id="familyname">
                  </div>
                  





                  <div class="col-md-12 flex-column align-items-center justify-content-center">
                    <label for="address" class="form-label">Country</label>
                    <select class="form-control" name="address" id="country">
                      <option value="Morocco">Morocco</option>
                      <option value="United States">United States</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="Canada">Canada</option>
                      <option value="Australia">Australia</option>
                      <option value="Germany">Germany</option>
                      <option value="France">France</option>
                      <option value="Spain">Spain</option>
                      <option value="Italy">Italy</option>
                      <option value="Brazil">Brazil</option>
                      <option value="Russia">Russia</option>
                      <option value="China">China</option>
                      <!-- Add other country options -->
                    </select>
                  </div>
                  <div class="col-md-12 flex-column align-items-center justify-content-center">
                    <label for="numero" class="form-label">Phone Number</label>
                    <div class="input-group">
                      <span class="input-group-text" name="phonePrefix" id="phonePrefix"></span>
                      <input type="text" class="form-control" name="numero" id="numero" required>
                    </div>
                  </div>
                  <div class="col-md-12 flex-column align-items-center justify-content-center">
                    <label for="actualjob" class="form-label">Actual Job</label>
                    <input type="text" class="form-control" name="actualjob" id="actualjob">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="col-md-12">
              <div class="form-group mt-3">
                <label for="diplomas">Diplomas:</label>
                <textarea class="form-control" name="diplomas[]" id="diplomas" rows="3"></textarea>
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
                <textarea class="form-control" name="experiences[]" id="experiences" rows="3"></textarea>
                <small class="form-text text-muted mt-3">Enter each experience on a new line.</small>
                <button type="button" class="btn btn-secondary mt-3" id="addExperienceBtn">Add Experience</button>
                <button type="button" class="btn btn-danger mt-3" id="removeExperienceBtn">Remove Experience</button>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="col-md-12">
              <div class="form-group mt-3">
                <label for="cv">Import a CV</label>
                <input type="file" name="cv" id="cv">
              </div>
            </div>
          </div>
          
          <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary bg-success border border-success" name="submit">Submit</button>
            <button type="submit" class="btn btn-primary bg-danger border border-danger" name="exit">Exit</button>
          </div>
        </form>
       
      </div>
    </div>
  </div>
</div>


    </div> 
    <script>
      // Update profile image
      const profileInput = document.getElementById('profile');
      const profileImage = document.getElementById('profileImage');
    
      profileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        const imageUrl = URL.createObjectURL(file);
        profileImage.src = imageUrl;
      });
    
      const countrySelect = document.getElementById('country');
  const phonePrefix = document.getElementById('phonePrefix');
  const phoneNumberInput = document.getElementById('numero');

  countrySelect.addEventListener('change', () => {
    const selectedCountry = countrySelect.value;
    let phoneNumberFormat = '';

    
        if (selectedCountry === 'Morocco') {
          phoneNumberFormat = '+212 ';
        } else if (selectedCountry === 'United States') {
          phoneNumberFormat = '+1 ';
        } else if (selectedCountry === 'United Kingdom') {
          phoneNumberFormat = '+44 ';
        } else if (selectedCountry === 'Canada') {
          phoneNumberFormat = '+1 ';
        } else if (selectedCountry === 'Australia') {
          phoneNumberFormat = '+61 ';
        }else if (selectedCountry === 'Germany') {
          phoneNumberFormat = '+49 ';
        }else if (selectedCountry === 'France') {
          phoneNumberFormat = '+33 ';
        }else if (selectedCountry === 'Spain') {
          phoneNumberFormat = '+34 ';
        }else if (selectedCountry === 'Italy') {
          phoneNumberFormat = '+39 ';
        }else if (selectedCountry === 'Brazil') {
          phoneNumberFormat = '+55 ';
        }else if (selectedCountry === 'Russia') {
          phoneNumberFormat = '+7 ';
        }else if (selectedCountry === 'China') {
          phoneNumberFormat = '+86 10 ';
        }
        phonePrefix.textContent = phoneNumberFormat;
  });

  phoneNumberInput.addEventListener('input', () => {
    //phoneNumberInput.value = phoneNumberInput.value.replace(/\D/g, '');
    phoneNumberInput.value = phoneNumberInput.value.slice('0','10');
  });
    </script>
    






<script src="createprofile.js">
    </script>


@endsection