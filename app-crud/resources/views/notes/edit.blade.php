@extends('layouts.app')
@section('content')
   

    <div class="container ">
        <h1 class="">Create Notes Here  </h1>  
      
      
    <form action="{{route('note.store')  }}" method="post"> 
        @csrf
        <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Note Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="exampleInputEmail1" placeholder="Title" aria-describedby="text">
          <div id="text" class="form-text"></div>
        </div>
        @error('title')
            {{ $message }}
        @enderror

        <div class="form-floating">
            <textarea class="form-control" name="body" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
            {{ old('body') }}
            </textarea>
            <label for="floatingTextarea2">Body</label>
        </div> 
        @error('body')
            {{ $message }}
        @enderror



       <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button> 
       </div>
      </form>
    </div>
@endsection