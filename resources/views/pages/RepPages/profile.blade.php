@extends('layouts.master')
@section('title','Profile')


@section('content')
              
                        
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">

<div class="col">
<div class="row">
  <div class="col mb-3">
    <div class="card">
      <div class="card-body">
        <div class="e-profile">
          <form method="POST" action="{{ url('editProfile') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
          {{ csrf_field() }}
        <div class="row">
            <div class="col-12 col-sm-auto mb-3">
              <div class="mx-auto" style="width: 140px;">
                 <div class="circle">
                   <img class="profile-pic" src="{{ asset('images/'.$image) }}">
                   <input type="hidden" value="{{ $image }}" name="currentPic">
                 </div>
     <div class="p-image">
       <i class="fa fa-camera upload-button"></i>
        <input class="file-upload" type="file" name="image" accept="image/*"/>
     </div>                
              </div>
            </div>
            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
              <div class="text-center text-sm-left mb-2 mb-sm-0">
			  <br/>
                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ $fullname }}</h4>
                
              
              </div>
            </div>
          </div>
		  <br/><br/>
          <div class="tab-content pt-3">
            <div class="tab-pane active">
              
                
                <input type="text" name="userId" value="{{$id}}" hidden>
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Fullname</label>
                          <input class="form-control" type="text" name="fullname" value="{{$fullname}}" required>
                          <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>adresse</label>
                          <input class="form-control" type="text" name="adresse" value="{{$adresse}}" required>
                          <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" type="text" name="email" value="{{$email}}" required>
                          <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Phone</label>
                          <input class="form-control" type="text" name="phone" value="{{$phone}}" required>
                          <div class="valid-feedback">Valid.</div>
                           <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-12 mb-3">
                    <div class="mb-2"><b>Change Password</b></div>
      
                    <!-- Current password -->
                    
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Current Password</label>
                          <input class="form-control" name="oldpass" type="password" value="{{$password}}" id="password-field">
						   <i toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></i>
                        </div>
                      </div>
                    </div>

                    <!-- New Password -->  
                    @if(Session::get('helpp')  == 1)
                  <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>New Password</label>
                          <input class="form-control is-invalid" name="newpass" type="password">
                          <div class="invalid-feedback">
                            Passwords are not the same.
                          </div>                  
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                          <input class="form-control is-invalid" name="confirm" type="password"></div>
                       </div>
                    </div>
                @else 
                <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>New Password</label>
                          <input class="form-control" name="newpass" type="password">
                          
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                          <input class="form-control" name="confirm" type="password"></div>
                      </div>
                    </div>
                      @endif
				</div>
</div>
                <div class="row">
                  <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div>

    
@endsection
  
<!-- end document-->







