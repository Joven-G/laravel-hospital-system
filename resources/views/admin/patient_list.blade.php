@extends('layouts.master')

@section('top_header')
<!-- content panel -->
<div class="main-panel">
  <!-- top header -->
  <header class="header navbar">

    <div class="brand visible-xs">
      <!-- toggle offscreen menu -->
      <div class="toggle-offscreen">
        <a href="#" class="hamburger-icon v2 visible-xs" data-toggle="offscreen" data-move="ltr">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <!-- /toggle offscreen menu -->

      <!-- logo -->
      <div class="brand-logo">
        Trust One Hospital
      </div>
      <!-- /logo -->
    </div>

    <ul class="nav navbar-nav hidden-xs">
      <li>
        <p class="navbar-text">
          View All Patient's
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
          <img src="{{ asset('images/avatar.jpg') }}" class="header-avatar img-circle ml10" alt="user" title="user">
          <span class="pull-left">Trust One Hospital</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ route('admin.index') }}">Dashboard</a>
          </li>
          <li>
            <a href="signin.html">Logout</a>
          </li>
        </ul>

      </li>

    </ul>
  </header>
  <!-- /top header -->
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
    <div class="panel mb25">
        <div class="panel-heading border">
          Patients Information
        </div>
        <div class="panel-body">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
      @endif
        
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb0">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Type</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Type</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $i =1 ; ?>
            @foreach ($patients as $patient)
              <tr>
              <td><?php echo $i; ?></td>
              <td>{{ $patient->name }}</td>
              <td>{{ $patient->patient_type }}</td>
              <td><a data-toggle="modal" data-target="#details<?php echo $i; ?>" href=""><button type="button" class="btn btn-success">Details</button></a></td>
              <div class="modal" id="details<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Patient's Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-4">
                          <p>Name</p>
                          <p>Patient Type</p>
                          <p>Patient ID</p>
                          <p>Gender</p>
                          <p>Birth Date</p>
                          <p>Blood Group</p>
                          <p>Symptoms</p>
                          <p>Selected Doctor</p>
                          <p>Admit Date </p>
                          <p>Admit Time</p>
                          <p>Allocated Seat</p>
                          <p>Mobile Number</p>
                          <p>Email</p>
                          <p>Address</p>
                          <p>Image Preview</p>
                        </div>
                        <div class="col-xs-7">
                          <p> : {{ $patient->name }}</p>
                          <p> : {{ ucfirst($patient->patient_type) }}</p>
                          <p> : {{ $patient->id or '101' }}</p>
                          <p> : {{ $patient->gender }}</p>
                          <p> : {{ $patient->birthDate }}</p>
                          <p> : {{ $patient->bloodGroup }}</p>
                          <p> : {{ $patient->symptoms }}</p>
                          <p> : {{ $patient->doctor_id }}</p>
                          <p> : {{ $patient->date }}</p>
                          <p> : {{ $patient->time }}</p>
                          <p> : {{ $patient->seat_id }}</p>
                          <p> : {{ $patient->mobile }} </p>
                          <p> : {{ $patient->email }}</p>
                          <p> : {{ $patient->address }}</p>
                          <p> : <img class="img-responsive" src="{{ asset('images/patients/'.$patient->image) }}" ></p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <td><a data-toggle="modal" data-target="#edit<?php echo $i; ?>" href=""><button type="button" class="btn btn-info">Edit</button></a></td>
              <div class="modal" id="edit<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Edit Information</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row mb25">
                      <form class="form-horizontal bordered-group" role="form" action="{{ route('patient.update') }}" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-sm-3 control-label">patient Type</label>
              <div class="col-sm-8">
                <select class="form-control" name="patient_type">
                  <option value="doctor" {{ $patient->patient_type == 'doctor' ? 'selected' : ''}}>Doctor</option>
                  <option value="nurse" {{ $patient->patient_type == 'nurse' ? 'selected' : ''}}>Nurse</option>
                  <option value="accountant" {{ $patient->patient_type == 'accountant' ? 'selected' : ''}}>Accountant</option>
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ Request::old('name') ? Request::old('name') : isset($patient) ? $patient->name : '' }} " required>
              </div>
            </div>
            

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Degree</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="degree" placeholder="Degree" value="{{ Request::old('degree') ? Request::old('degree') : isset($patient) ? $patient->degree : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Gender</label>
              <div class="col-sm-8"> 
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio1" value="Male" {{ $patient->gender == 'Male' ? 'checked' : ''}} > Male
                </label>
                <label class="radio-inline">
                  <input type="radio" name="gender" id="inlineRadio2" value="Female" {{ $patient->gender == 'Female' ? 'checked' : ''}}> Female
                </label>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Date of Birth</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" data-provide="datepicker" name="birthDate" value="{{ Request::old('birthDate') ? Request::old('birthDate') : isset($patient) ? $patient->birthDate : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Specialization</label>
              <div class="col-sm-8">
                <select class="form-control" name="specialist">
                  <option value="medicine" {{ $patient->specialist == 'medicine' ? 'selected' : ''}}>Medicine</option>
                  <option value="surgery" {{ $patient->specialist == 'surgery' ? 'selected' : ''}}>Surgery</option>
                  <option value="">Neurologiest</option>
                </select>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Visiting Charge</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="charge" value="{{ Request::old('charge') ? Request::old('charge') : isset($patient) ? $patient->charge : '' }} " required>
              </div>
            </div>


            <div class="form-group clear">
              <label class="col-sm-3 control-label">Mobile Number</label> 
              <div class="col-sm-8">
                <input class="form-control" type="tel" required name="mobile" name="mobile" value="{{ Request::old('mobile') ? Request::old('mobile') : isset($patient) ? $patient->mobile : '' }} ">
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" name="email" value="{{ Request::old('email') ? Request::old('email') : isset($patient) ? $patient->email : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Home Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="hAddress" value="{{ Request::old('hAddress') ? Request::old('hAddress') : isset($patient) ? $patient->hAddress : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Office Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="oAddress" value="{{ Request::old('oAddress') ? Request::old('oAddress') : isset($patient) ? $patient->oAddress : '' }} " required>
              </div>
            </div>

            <div class="form-group clear">
              <label class="col-sm-3 control-label">Previous Image</label>
              <div class="col-sm-8">
                <img src="{{ asset('images/patients/'.$patient->image) }}" class="img-responsive" alt="">
                <input class="mt25" type="file" name="image">
              </div>
            </div>

            
         
                    </div>
                    </div>
                    <div class="modal-footer no-border">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success">Update</button>
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                      <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                    </div>
                  </div>
                </div>
              </div>
               </form>
              

              <td><a data-toggle="modal" data-target="#delete<?php echo $i; ?>" href=""><button type="button" class="btn btn-danger">Delete</button></a></td>
              <div class="modal" id="delete<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Delete patients Information</h4>
                  </div>
                  <div class="modal-body">
                      Are you sure ?
                  </div>
                  <form action="{{ route('patient.delete') }}" method="">
                  <div class="modal-footer no-border">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                  </div>
                  </form>
                </div>
              </div>
              </div>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
        <section>
        <nav>
          <ul class="pager">
              @if($patients->currentPage() !== 1)
                <li class="previous"><a href="{{ $patients->previousPageUrl() }}"><span aria-hidden="true">&larr;</span> Older</a></li>
              @endif
              @if($patients->currentPage() !== $patients->lastPage() && $patients->hasPages())
                <li class="next"><a href="{{ $patients->nextPageUrl() }}">Newer <span aria-hidden="true">&rarr;</span></a></li>
              @endif
          </ul>
        </nav>
      </section>
      </div>

      </div>
    </div>
  </div>
  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection