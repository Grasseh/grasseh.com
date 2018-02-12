<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Parsedown;
use Session;
use Config;
use Redirect;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index()
    {
        if(!$this->isAuthenticated()){
            return view('upload.login');
        }
        return view('upload.index');
    }

    public function login(Request $request)
    {
        if($request->get('username','') == Config::get('upload.username') && $request->get('password','') == Config::get('upload.password')){
            Session::put('upload_session', Config::get('upload.session'));
        }
        return Redirect::route('upload.index');
    }

    public function postFile(Request $request)
    {
        if ($request->file('file')->isValid()) {
            $request->file('file')->move("../public/images/", $request->file('file')->getClientOriginalName());
        }
        return Redirect::back();
    }

    private function isAuthenticated(){
        return Session::get('upload_session','') == Config::get('upload.session');
    }
}
