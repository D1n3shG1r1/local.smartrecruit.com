<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Notes_model;
use App\Models\SuperAdmin_model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Notes extends Controller
{
    var $USERID = 0;
    
    function __construct(){   
        parent::__construct();
        $this->USERID = $this->getSession('id');
    }

    function notes(Request $request){
    
        if($this->USERID > 0){
            $userId = $this->USERID;
            $page = $request->input('page', 1);
            $notes = Notes_model::select('id', 'title', 'description', 'content', 'createdDateTime')
            ->orderBy('createdDateTime', 'desc')
            ->paginate(1, ['*'], 'page', $page);

            $data = array();
            $data["pageTitle"] = "All Notes";
            $data["notesUrl"] = url('admin/notes');
            $data["notes"] = $notes;
            
            return View("admin.notes",$data);

        } else {
            return Redirect::to(url('/'));
        }    
    }

    function loadmore(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;
            $page = $request->input('page', 1);
            $notes = Notes_model::select('id', 'title', 'description', 'content', 'createdDateTime')
            ->orderBy('createdDateTime', 'desc')
            ->paginate(1, ['*'], 'page', $page);

            // Render partial blade
            return view('admin.partials.note-list', [
                'notes' => $notes,
                'page' => $page
            ])->render();
        }
    }

    function note($id){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $note = Notes_model::where("id", $id)->first();
            if($note){
                
                $data = array();
                $data["pageTitle"] = "Edit Note";
                $data["note"] = $note;
                
                return View("admin.editNote",$data);
            }else{
                return Redirect::to(url('/pagenotfound'));
            }
            
        } else {
            return Redirect::to(url('/'));
        }
    }

    function createnote(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $data = array();
            $data["pageTitle"] = "Create Note";
            $data["notesUrl"] = url('admin/notes');
            
            return View("admin.createNote",$data);

        } else {
            return Redirect::to(url('/'));
        }
    }

    function savenote(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $_token = $request->input("_token");
            $title = $request->input("title");
            $description = $request->input("description");
            $content = $request->input("content");
            $sakey = $request->input("sakey");

            $createdDateTime = date("Y-m-d H:i:s");
            $updatedDateTime = date("Y-m-d H:i:s");

            $note = new Notes_model();
            $note->id = db_randnumber();
            $note->title = $title;
            $note->description = $description;
            $note->content = $content;
            $note->createdDateTime = $createdDateTime;
            $note->updatedDateTime = $updatedDateTime;
            $saved = $note->save();
            
            $postBackData = array();

            if($saved){
                
                $postBackData["success"] = 1;

                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your note has been successfully created."
                );
            }else{
                
                $postBackData["success"] = 0;

                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Something went wrong. Please try again."
                );
            }   

        } else {
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    function updatenote(Request $request){
        if($this->USERID > 0){
            $userId = $this->USERID;
            
            $_token = $request->input("_token");
            $id = $request->input("id");
            $title = $request->input("title");
            $description = $request->input("description");
            $content = $request->input("content");
            $sakey = $request->input("sakey");

            $createdDateTime = date("Y-m-d H:i:s");
            $updatedDateTime = date("Y-m-d H:i:s");


            $updateData = array(
                "title" => $title,
                "description" => $description,
                "content" => $content,
                "updatedDateTime" => $updatedDateTime,
                
            );

            $saved = Notes_model::where("id", $id)->update($updateData);
            
            $postBackData = array();

            if($saved){
                
                $postBackData["success"] = 1;

                $response = array(
                    "C" => 100,
                    "R" => $postBackData,
                    "M" => "Your note has been successfully updated."
                );
            }else{
                
                $postBackData["success"] = 0;

                $response = array(
                    "C" => 101,
                    "R" => $postBackData,
                    "M" => "Something went wrong. Please try again."
                );
            }   

        } else {
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }

    function notedelete(Request $request){
        if($this->USERID > 0){
            $_token = $request->input("_token");
            $id = $request->input("id");
            Notes_model::where("id", $id)->delete();

            $postBackData = array();
            $postBackData["success"] = 1;

            $response = array(
                "C" => 100,
                "R" => $postBackData,
                "M" => "Note deleted successfully."
            );

        }else{
            $postBackData = array();
            $response = array(
                "C" => 1004,
                "R" => $postBackData,
                "M" => "session expired."
            );
        }

        return response()->json($response); die;
    }
}