@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
])

@section('content')
    <div class="content">
    @include('layouts.alerts')
            
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
  <li class="nav-item">
    <a class="nav-link" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab" aria-controls="permissions" aria-selected="false">Permissions</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="teams-tab" data-toggle="tab" href="#teams" role="tab" aria-controls="teams" aria-selected="false">Team Members</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

  <br>
        <div class="row">
            <div class="col-md-4 bg-dark text-white">
                <div class="card card-user bg-dark text-white border border-white">
                    <div class="image">
                        <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset('paper/img/mike.jpg') }}" alt="...">

                                <h5 class="title">{{ __(auth()->user()->name)}}</h5>
                            </a>
                            <p class="description">
                            @ {{ __(auth()->user()->name)}}
                            </p>
                        </div>
                        <p class="description text-center">
                            {{ __('I like the way you work it') }}
                            <br> {{ __('No diggity') }}
                            <br> {{ __('I wanna bag it up') }}
                        </p>
                    </div>
                    <div class="card-footer text-white">
                        <hr class=" bg-white">
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                    <h5>{{ __('12') }}
                                        <br>
                                        <small>{{ __('Files') }}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>{{ __('2GB') }}
                                        <br>
                                        <small>{{ __('Used') }}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-3 mr-auto">
                                    <h5>{{ __('24,6$') }}
                                        <br>
                                        <small>{{ __('Spent') }}</small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        
        <br>
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card bg-dark text-white border border-white">
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
             <div class="col-md-4">
                <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card bg-dark text-white border border-white">
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

    
    
    
    

    <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">
        <br>
        <div class="row">

                <!-- PERMISSIONS -->
                @csrf
                <div class="col-md-4">
                    <div class="card bg-dark text-white border border-white">
                        <div class="card-header">
                            <h5 class="title">{{ __('User Permissions') }}</h5>
                        </div>
                        <div class="card-body">
                        <table >
                <head>
                <tr>
                <th>Permission</th>
                <th>Allow/Disallow</th>
                </tr>
                </head>
                <tbody>
                <tr><td>View Clients</td><td>@if(auth()->user()->clients_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Clients</td><td>@if(auth()->user()->clients_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Clients</td><td>@if(auth()->user()->clients_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Remove Clients</td><td>@if(auth()->user()->clients_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Invoices</td><td>@if(auth()->user()->invoices_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Invoices</td><td>@if(auth()->user()->invoices_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Invoices</td><td>@if(auth()->user()->invoices_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Delete Invoices</td><td>@if(auth()->user()->invoices_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Quotes</td><td>@if(auth()->user()->quotes_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Quotes</td><td>@if(auth()->user()->quotes_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Quotes</td><td>@if(auth()->user()->quotes_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Delete Quotes</td><td>@if(auth()->user()->quotes_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Purchases</td><td>@if(auth()->user()->purchases_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Purchases</td><td>@if(auth()->user()->purchases_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Purchases</td><td>@if(auth()->user()->purchases_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Delete Purchases</td><td>@if(auth()->user()->purchases_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Marketing</td><td>@if(auth()->user()->marketing_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Marketing</td><td>@if(auth()->user()->marketing_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Marketing</td><td>@if(auth()->user()->marketing_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Delete Marketing</td><td>@if(auth()->user()->marketing_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Projects</td><td>@if(auth()->user()->projects_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Projects</td><td>@if(auth()->user()->projects_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Projects</td><td>@if(auth()->user()->projects_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Delete Projects</td><td>@if(auth()->user()->projects_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Tasks</td><td>@if(auth()->user()->tasks_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Tasks</td><td>@if(auth()->user()->tasks_add == "on") Yes @else  No @endif</td></tr>
                <tr><td>Edit Tasks</td><td>@if(auth()->user()->tasks_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Delete Tasks</td><td>@if(auth()->user()->tasks_del == "on") Yes @else No @endif</td></tr>
                <tr><td><hr class="bg-white"></td><td><hr class="bg-white"></td></tr>
                <tr><td>View Suppliers</td><td>@if(auth()->user()->suppliers_view == "on") Yes @else No @endif</td></tr>
                <tr><td>Add Suppliers</td><td>@if(auth()->user()->suppliers_add == "on") Yes @else No @endif</td></tr>
                <tr><td>Edit Suppliers</td><td>@if(auth()->user()->suppliers_edit == "on") Yes @else No @endif</td></tr>
                <tr><td>Remove Suppliers</td><td>@if(auth()->user()->suppliers_del == "on") Yes @else No @endif</td></tr>
                </tbody>
                </table>
                        </div>
                        <div class="card-footer ">
                            
                        </div>
                    </div>
</div>
        </div>
    </div>

                <!-- END PERMISSIONS -->

                <div class="tab-pane fade" id="teams" role="tabpanel" aria-labelledby="teams-tab">
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-dark text-white border border-white">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Team Members') }}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/ayo-ogunseinde-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{ __('DJ Khaled') }}
                                        <br />
                                        <span class="text-muted">
                                            <small>{{ __('Offline') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/joe-gardner-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                            {{ __('Creative Tim') }}
                                        <br />
                                        <span class="text-success">
                                            <small>{{ __('Available') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/clem-onojeghuo-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-ms-7 col-7">
                                        {{ __('Flume') }}
                                        <br />
                                        <span class="text-danger">
                                            <small>{{ __('Busy') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
             </div>
            </div>
        </div>

    </div>
            

</div>
@endsection