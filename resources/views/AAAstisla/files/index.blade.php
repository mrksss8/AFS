@extends('AAAstisla.layouts.master_layout')

@section('content')
<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Folder <strong>{{ $folder->folder_name }}</strong></h1> --}}
    {{-- <h1 class="h3 mb-4 text-gray-800">Contents of <strong>{{ $subfolder->subfolder_name }}</strong></h1> --}}

    {{-- <p>count of file in this folder <strong>{{$count_file[0]->subfolder->id}} </strong> </p> --}}

    <h1 class = "mb-5 mt-5 text-dark">Contents of <strong>{{ $folder->folder_name}} {{$subfolder->subfolder_name}}</strong></h1>
    <a class="btn btn-lg btn-primary mb-4 ml-5" href="{{ route('files.create', [$folder->folder_name, $subfolder->subfolder_name, $subfolder->id])}}">Add File</a>


        @if(Session::has('Fileadded'))
            <div class="row ">
                <div class="col-12">
                    <div class="alert alert-success">
                        {{Session::get('Fileadded')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
              <h4>List of Files</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-dark" id = "files-table">
                    <thead>
                        <tr>
                            <th>Refference Number</th>
                            <th>File Name</th>
                            <th>Description</th>
                            <th>Document</th>
                            <th>Upload Date</th>               
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file->id }}</td>
                                <td>{{ $file->filename }}</td>
                                <td>{{ $file->description }}</td>
                                <td>{{ $file->document }}</td>
                                <td>{{ $file->created_at->format('M d Y')}}</td>
                                <td class="d-flex justify-content-around">
                                    <a class="btn btn-primary btn-action" href="{{route ('file.edit', $file->id)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt text-dark"></i></a>
                                    <a class="btn btn-success btn-action" href="{{route ('file.download', $file->id)}}" data-toggle="tooltip" title="Download"><i class="fas fa-download text-dark"></i></a>

                                    <form action="{{route ('archive.archive', $file->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" value="Delete" class ="btn btn-danger btn-action" data-toggle="tooltip" title="Archive"><i class="fas fa-trash text-dark"></i></button>
                                        {{-- <a class="btn btn-danger btn-action mr-1" href="" data-toggle="tooltip" title="Edit"><i class="fas fa-download"></i></a> --}}
                                    </form>

                                    <button class="btn btn-sm btn-primary file" data-toggle="modal"
                                    data-target="#updateModal" data-id="{{ $file['id'] }}"
                                    data-name="{{ $file['status'] }}">Share</button>
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        

<!-- Modal update-->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST">
                    @method('PUT')
                    @csrf
                    {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                        value="Registrar">
                    <label class="form-check-label" for="exampleRadios1">
                        Registrar
                    </label>
                </div> --}}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Send To</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                            <option value="Unshare">Unshare</option>
                        </select>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning btn-action center"
                        onclick="document.getElementById('updateForm').submit()">Share<i
                            class="fas fa-share text-white ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('.file').each(function() {
                $(this).click(function(event) {
                    $('#updateForm').attr("action", "/files/share/" + $(this).data("id") + "")
                    $('#status').val($(this).data("status"))
                })
            })
        });
    </script>

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
         $('#files-table'). DataTable();
        });
    </script>         
@endsection