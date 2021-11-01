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


{{-- <form action ="{{ route('subfolder.store')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="Filename">Subfolder Name</label>
        <input type="text" class="form-control" name ="subfoldername" placeholder="Enter Subfolder Name">
    </div>

    <div class="form-group">
      <label for="Select Folder">Select Folder</label>
      <select class="form-control" id="exampleFormControlSelect1" name ="folder_id">

        @foreach ($folders as $folder)
            @if (Auth::user()->role === 'Super Admin')
              <option value = "{{ $folder->id}}">{{ $folder->folder_name}}</option>
            @else
              @if ($folder->role === Auth::user()->role)
                <option value = "{{ $folder->id}}">{{ $folder->folder_name}}</option>
              @endif
            @endif
        @endforeach
          
      </select>
    </div>

      <button type = "submit" class="btn btn-sm btn-primary mt-3">Save</button>
      <a class="btn btn-sm btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>

    </form> --}}


    <form action ="{{ route('subfolder.store')}}" method="post">
      @csrf
    <div class="row">
      <div class="col-12 col-md-8 col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Add Subfolder</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Enter Subfolder name</label>
              <input type="text" class="form-control" name ="subfoldername">
            </div>
            <div class="form-group">
              <label>Select Folder</label>
              <select class="form-control" id="exampleFormControlSelect1" name ="folder_id">
        
                @foreach ($folders as $folder)
                    @if (Auth::user()->role === 'Admin')
                      <option value = "{{ $folder->id}}">{{ $folder->folder_name}}</option>
                    @else
                      @if ($folder->role === Auth::user()->role)
                        <option value = "{{ $folder->id}}">{{ $folder->folder_name}}</option>
                      @endif
                    @endif
                @endforeach
                  
              </select>
            </div>
            <button type = "submit" class="btn btn-sm btn-primary mt-3">Save</button>
            <a class="btn btn-sm btn-primary mt-3" href = {{route ('dashboard.index')}}>Cancel</a>
          </div>
          </div>
        </div>  
      </div>
    </div>
    </form>


@endsection