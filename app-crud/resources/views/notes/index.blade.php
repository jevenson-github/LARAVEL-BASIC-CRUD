@extends('layouts.app')
@section('content') 
<div class="container">

     <a href="{{ route('note.create') }}">Create Note</a>
    <h1> Note  Here  </h1>

    {{-- Session Message After the Successful Insertion  --}}
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> {{ session('message')}}
      </div>
    @endif  

    <div class="row">
      <table >
     <th>Title</th>
     <th>View</th>
     <th>Edit</th>
     <th>Delete</th>
     <th>Date Created</th>
  <body>
    
 
    @foreach ($notes as $note)
    <tr>
        <td>{{  $note['title'] }}</td>
        <td><button class="show-note bg-success" data-url="{{route('note.view' ,  ['note' => $note->notesId] ) }}">View </button>
        </td> 
        <td><a href="{{ route('note.edit', ['note' => $note->notesId]) }}">Edit</a></td>
        <td>Delete</td>
        <td>{{ date('F d, Y',$note->create_at) }}</td>
    </tr>
          
    @endforeach  

    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showNotesModal">
      Launch demo modal
    </button> --}}

    <!-- Modal -->
<div class="modal fade" id="showNotesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <p id="title" ></p>
     <p id="body" ></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

{{-- End of Modal  --}}
</body>
</table>
</div>
</div>
@endsection 

@section('jquery_script')
<script> 

  // View Notes using Ajax 
    $(document).ready(function(){

      $(".show-note").click( function(){ 
        var userUrl =  $(this).data('url');  
        $.get( userUrl, function( data ) {
              $('#showNotesModal').modal('show');  
                    $('#exampleModalLabel').text(data.title); 
                    $('#body').text(data.body); 
                // console.log(data); 
            });
      });
    });
    </script>
@endsection