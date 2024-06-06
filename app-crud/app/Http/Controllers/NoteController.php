<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

     public function update(Request $request, $notesId) { 

          // validation 
          $data = $request->validate([
               'title' => 'required', 
               'body' => 'required'
          ]); 

          // update process 

         Note::where('notesId',$notesId)->update([
            'title' =>$request->title,
            'body' => $request->body
         ]); 


         return redirect(route('note.index'))->with('message','Note Updated Successfuly'); 
         // dd($notesId);


     } 

     // view notes 
     public function view($notes){
        $data = Note::where('notesId', $notes)->first();
      //  return response()->json($data );
       return response()->json($data, 200);
     }

     //delete note 
     public function delete($id){
      
      // cannot do becauase in the model the specified id is not notesId
      // $note = Note::where('notesId', $note)->firstOrFail(); 
      // $note->delete();  
      DB::table('notes')->where('notesId', '=', $id)->delete();

      return response()->json(['message' => 'Note Deleted Succesfuly'], 200); 

     }
}
