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
  <body>
    
 
    @foreach ($notes as $note)
    <tr>
        <td>{{  $note['title'] }}</td>
        <td>View</td> 
        <td><a href="{{ route('note.edit', ['note' => $note->notesId]) }}">Edit</a></td>
        <td>Delete</td>
    </tr>
          
    @endforeach
</body>
</table>
</div>
</div>
@endsection