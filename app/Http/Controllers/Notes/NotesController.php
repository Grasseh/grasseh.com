<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Parsedown;
use Session;
use Config;
use Redirect;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        if(!$this->isAuthenticated()){
            return view('notes.login');
        }
        $directory = scandir('../resources/notes/');
        $filteredDirectories = array_diff($directory,array('.gitkeep','..','.'));

        return view('notes.index',['folders' => $filteredDirectories]);
    }

    public function login(Request $request)
    {
        if($request->get('username','') == Config::get('notes.username') && $request->get('password','') == Config::get('notes.password')){
            Session::put('notes_session', Config::get('notes.session'));
        }
        return Redirect::route('notes.index');
    }

    public function class($dir)
    {
        if(!$this->isAuthenticated()){
            return view('notes.login');
        }
        $directory = scandir('../resources/notes/' . $dir);
        $filteredFiles = array_diff($directory,array('.gitkeep','..','.'));

        return view('notes.class',['files' => $filteredFiles, 'class' => $dir]);
    }

    public function postFile(Request $request, $dir)
    {
        if ($request->file('file')->isValid()) {
            $request->file('file')->move("../resources/notes/" . $dir, $request->file('file')->getClientOriginalName());
        }
        return Redirect::back();
    }

    public function file($dir, $file)
    {
        if(!$this->isAuthenticated()){
            return view('notes.login');
        }

        $data = file_get_contents("../resources/notes/" . $dir . "/" . $file);
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $content = $data;
        if($ext == "md"){
            $Parsedown = new Parsedown();
            $content = $Parsedown->text($data);
        }

        return view('notes.files',['dir' => $dir, 'name' => $file, 'content' => $content] );
    }

    private function isAuthenticated(){
        return Session::get('notes_session','') == Config::get('notes.session');
    }
}
