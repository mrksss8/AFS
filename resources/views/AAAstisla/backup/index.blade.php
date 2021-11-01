@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->

<h1 class = "mb-5 mt-5 text-dark">Backup Files</h1>
<div class="row">
      <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Backup Files</h4>
          </div>
          <div class="card-body">
           Lorem ipsum dolor sit amet consectetur adipisicing elit. A consectetur rerum perferendis!
          </div>
          <div class="card-footer text-right">
            <a class="btn btn-md btn-primary mr-4" href = {{route ('backup.generateAndDownload')}}>Generate Backup and Download</button>
              <a class="btn btn-md btn-primary" href = {{route ('dashboard.index')}}>Cancel</a>
          </div>
        </div>
         
      </div>
</div>
@endsection