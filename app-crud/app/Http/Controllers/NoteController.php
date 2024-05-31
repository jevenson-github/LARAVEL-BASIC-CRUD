<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; 
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // 
    // to apply here  also the validation in controller 
     public function __construct()
     {
         $this->middleware('auth');
     } 
     
     // index page for notes 
     public function index(){

      /// get the users id 
      $userId = Auth::user()->id; 
      // query    
      $data = Note::where('userId', $userId)->get();
      return view('notes.index', ['notes'=> $data]); 

     }   
     // creates notes form 
     public function create(){
        return view('notes.create'); 
     }

     // store the notes 
     public function store(Request $request){

      // validate the notes 
      $data = $request->validate([
         'title'=> 'required', 
         'body' => 'required'
      ]); 

       // Add the authenticated user's ID to the data
       $data['userId'] = Auth::user()->id;
      Note::create($data); 
      return redirect(route('note.index'))->with('message','Note Added Successfuly'); 

     }
     //edit 
     public function edit($notesId) { 
      
      $data = Note::where('notesId', $notesId)->first();
      // dd($data); 
      return view('notes.edit', ['note'=> $data]); 
     }
}
