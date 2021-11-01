@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->

<h1 class = "mb-5 mt-5 text-dark">Archive Files</h1>

<div class="card">
    <div class="card-header">
      <h4>List of Archive Files</h4>
    </div>
    <div class="card-body">
  
        <table class="table table-bordered" id = "files-table">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>Document</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($archives as $archive)
                    <tr>       
                        <td>{{ $archive->filename }}</td>
                        <td>{{ $archive->description }}</td>
                        <td>{{ $archive->document }}</td>
                        <td> <a class="btn btn-sm btn-success ml-3 mr-3" href="{{route ('archive.download', $archive->id)}}">Download</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer text-right">
        <a class="btn btn-primary ml-5" href="{{ route('setting.index') }}">Back</a>
        </div>
    
</div>
@endsection


@section('pages_level_css')
    <!-- Custom styles for this page -->
    <link href="{{asset ('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection



@section('pages_level_scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
         $('#files-table').DataTable();
        });
    </script> 
@endsection