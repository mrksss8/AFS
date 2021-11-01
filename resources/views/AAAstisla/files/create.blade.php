@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->



 {{-- error validation --}}
    @if ($errors->any())
      <div class="row">
        <div class="col-12">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    @endif

    <div class="row">
      <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Add Folder</h4>
          </div>
          <div class="card-body">
            <form action ="{{route('files.store', [$folder, $subfolder, $subfolder_id])}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="Filename">File name</label>
                  <input type="text" class="form-control" name ="filename" >
              </div>
              <div class="form-group">
                  <label for="Description">Description</label>
                  <input type="text" class="form-control" name ="description">
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" name ="subfolder_id" value="{{ $subfolder_id }}">
              </div>
              <div class="form-group">
                  <label for="File">File</label>
                  <input type="file" class="form-control-file" name = "file" >
              </div>
                <button type = "submit" class="btn btn-md btn-primary mt-3 ">Save</button>
                <a class="btn btn-md btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
        </form>
            
          </div>
          </div>
        </div>  
      </div>
    </div>
  
    {{-- <div class="row ml-3 col-lg-12">
      <form action ="{{route('files.store', [$folder, $subfolder, $subfolder_id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Filename">File name</label>
                <input type="text" class="form-control" name ="filename" placeholder="Enter File Name">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input type="text" class="form-control" name ="description" placeholder="Enter Description">
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name ="subfolder_id" value="{{ $subfolder_id }}">
            </div>
            <div class="form-group">
                <label for="File">File</label>
                <input type="file" class="form-control-file" name = "file" >
            </div>
              <button type = "submit" class="btn btn-md btn-primary mt-3 ">Save</button>
              <a class="btn btn-md btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
      </form>
      
    </div> --}}
    @endsection