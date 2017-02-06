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
            Session::set('notes_session', Config::get('notes.session'));
        }
        return Redirect::route('notes.index');
    }

    private function isAuthenticated(){
        return Session::get('notes_session','') == Config::get('notes.session'); 
    }

    public function show($id, $name)
    {
		$request = strtolower($_SERVER["REQUEST_URI"]);
		$matches = [];
		preg_match("/\/blog\/(.+)-(.+)/",$request,$matches);

		//Find file
		$no = glob("../resources/blog/entries/" . $matches[1] . "-*.md");

		$data = file_get_contents($no[0]);
		$Parsedown = new Parsedown();

        return view('blog.entry',['name' => $name, 'content' => $Parsedown->text($data)]);
    }
}
