@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Record</h1>

<div class="row">
    <div class="col-sm-6 mb-2">
      <div class="card">
        <div class="card-header">
          <h4>Edit</h4>
        </div>
        <div class="card-body">
            <form action ="{{ route('file.update', $file)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="Filename">File name</label>
                    <input type="text" class="form-control" name ="filename" autocomplete="off" value ="{{ $file->filename }}">
                  </div>
                  <div class="form-group">
                    <label for="Description">Description</label>
                    <input type="text" class="form-control" name ="description" autocomplete="off" value ="{{ $file->description }}">
                  </div>     

                  <div class="form-group">
                    <label for="File">File</label>
                    <input type="file" class="form-control-file" name = "file" >
                </div>
        
        </div>
        <div class="card-footer text-right">
            <button type = "submit" class="btn btn-md btn-primary mr-3"}}> Update </button>
            <a class="btn btn-md btn-primary" href = {{route ('dashboard.index')}}>Cancel</a>
        </div>
      </form>
      </div>
    </div>

@endsection