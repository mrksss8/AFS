@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->

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

    <form action ="{{ route('folder.store')}}" method="post">
      @csrf
    <div class="row">
      <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Add Folder</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Enter Folder name</label>
              <input type="text" class="form-control" name ="foldername">
            </div>
            <div class="card-footer text-right">
            <button type = "submit" class="btn btn-md btn-primary mr-4">Save</button>
            <a class="btn btn-md btn-primary" href = {{route ('dashboard.index')}}>Cancel</a>
            </div>
          </div>
          </div>
        </div>  
      </div>
    </div>
    </form>
      

{{-- <form action ="{{ route('folder.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="Foldername">Folder Name</label>
        <input type="text" class="form-control" name ="foldername" placeholder="Enter Folder Name">
    </div>
    <button type = "submit" class="btn btn-sm btn-primary mt-3">Save</button>
    <a class="btn btn-sm btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
</form> --}}

@endsection