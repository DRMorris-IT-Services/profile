@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
        @include('profile::layouts.alerts')

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Update Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Change Password</a>
            </li>
            
          </ul>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h3>{{ __('Profile') }}</h3></div>
        
                        <div class="card-body">
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              
                                <br>
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="card card-user">
                                                  
                                                  <div class="card-body">
                                                     
                              
                                                              <h5 class="title">{{ __(auth()->user()->name)}}</h5>
                                                     
                                                          <p class="description">
                                                          @ {{ __(auth()->user()->name)}}
                                                          </p>
                                                     
                                                      <p class="description">
                                                          
                                                      </p>
                                                  </div>
                                                  <div class="card-footer">
                                                     

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                              
                                  </div>
                              
                              
                                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                      
                                      <br>
                                      <div class="row">
                                          <div class="col-md-12">
                                              <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('PUT')
                                                  <div class="card ">
                                                      <div class="card-header">
                                                          <h5 class="title">{{ __('Edit Profile') }}</h5>
                                                      </div>
                                                      <div class="card-body">
                                                          <div class="row">
                                                              <label class="col-md-3 col-form-label">{{ __('Name') }}</label>
                                                              <div class="col-md-9">
                                                                  <div class="form-group">
                                                                      <input type="text" name="name" class="form-control" placeholder="Name" value="{{ auth()->user()->name }}" required>
                                                                  </div>
                                                                  @if ($errors->has('name'))
                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                          <strong>{{ $errors->first('name') }}</strong>
                                                                      </span>
                                                                  @endif
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                                              <div class="col-md-9">
                                                                  <div class="form-group">
                                                                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                                                  </div>
                                                                  @if ($errors->has('email'))
                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                          <strong>{{ $errors->first('email') }}</strong>
                                                                      </span>
                                                                  @endif
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="card-footer ">
                                                          <div class="row">
                                                              <div class="col-md-12 text-center">
                                                                  <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              
                                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                      <br>
                                      <div class="row">
                                           <div class="col-md-12">
                                              <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                                                  @csrf
                                                  @method('PUT')
                                                  <div class="card">
                                                      <div class="card-header">
                                                          <h5 class="title">{{ __('Change Password') }}</h5>
                                                      </div>
                                                      <div class="card-body">
                                                          <div class="row">
                                                              <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                                                              <div class="col-md-9">
                                                                  <div class="form-group">
                                                                      <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                                                  </div>
                                                                  @if ($errors->has('old_password'))
                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                          <strong>{{ $errors->first('old_password') }}</strong>
                                                                      </span>
                                                                  @endif
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                                                              <div class="col-md-9">
                                                                  <div class="form-group">
                                                                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                                  </div>
                                                                  @if ($errors->has('password'))
                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                          <strong>{{ $errors->first('password') }}</strong>
                                                                      </span>
                                                                  @endif
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                                                              <div class="col-md-9">
                                                                  <div class="form-group">
                                                                      <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                                                  </div>
                                                                  @if ($errors->has('password_confirmation'))
                                                                      <span class="invalid-feedback" style="display: block;" role="alert">
                                                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                                      </span>
                                                                  @endif
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="card-footer ">
                                                          <div class="row">
                                                              <div class="col-md-12 text-center">
                                                                  <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                                              </div>
                                                          </div>
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