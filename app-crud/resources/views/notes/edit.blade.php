@extends('layouts.app')
@section('content')
   

    <div class="container ">
        <h1 class="">Create Notes Here  </h1>  
        
        {{-- <p >If you click on me, I will disappear.</p>
        <p>Click me away!</p>
        <p>Click me too!</p> --}}

          
    <form method="POST" action="{{ route('note.update', ['note'=> $note->notesId]) }}" > 
        
        {{-- to over ride the post method  --}}
        @method('PUT')
        @csrf
        <input type="hidden" name="notesId" value="{{$note->notesId}}">

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Note Title</label>
          <input type="text" name="title" class="form-control" value="{{ $note->title }}" id="exampleInputEmail1" placeholder="Title" aria-describedby="text">
          <div id="text" class="form-text"></div>
        </div>
        @error('title')
            {{ $message }}
        @enderror

        <div class="form-floating">
            <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
            {{  $note->body }}
            </textarea>
            <label for="floatingTextarea2">Body</label>
        </div> 
        @error('body')
            {{ $message }}
        @enderror

       <div class="mt-3"> 
       <input type="submit" value="Update"/ >
       </div>
      </form>
    </div>
    
@endsection

