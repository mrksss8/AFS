@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->


@role('Admin')

<h1 class = "mb-5 mt-5 text-dark"> Settings</h1>

<div class="row">
  <div class="col-lg-6 mb-4 ml-auto text-center">
  </div>
</div>

  <div class="row">
    <div class="col-sm-6 mb-2">
      <div class="card">
        <div class="card-header">
          <h4>Register Employee</h4>
        </div>
        <div class="card-body">
          To register new employee click the button below
        </div>
        <div class="card-footer text-right">
          <a href="{{route('register')}}" class="btn btn-primary">Go to Registration</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6 mb-2">
    <div class="card">
      <div class="card-header">
        <h4>View Archive Files</h4>
      </div>
      <div class="card-body">
        Here is when you can see the file than have been archive.
      </div>
      <div class="card-footer text-right">
        <a href="{{route('archive.index')}}" class="btn btn-primary">Go to Archive Files</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 mb-2">
    <div class="card">
      <div class="card-header">
        <h4>Back-Up Files</h4>
      </div>
      <div class="card-body">
       Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores perferendis ullam quos? Eos, dicta nam.
      </div>
      <div class="card-footer text-right">
        <a href="{{route('backup.index')}}" class="btn btn-primary">Go to Backup File Sections</a>
      </div>
    </div>
  </div>
  </div>
@endrole
@endsection