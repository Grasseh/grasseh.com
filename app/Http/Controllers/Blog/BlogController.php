<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Parsedown;

class BlogController extends Controller
{
    public function index()
    {
		$files = scandir('../resources/blog/entries/');
		$filteredFiles = array_diff($files,array('..','.'));

        $filteredFiles = array_reverse($filteredFiles);
		$fileLinks = [];
        foreach ($filteredFiles as $file){
            preg_match("/(.+)-(.+)\.md/",$file,$matches);
            $fileLinks[] = "<a href='/blog/".$matches[1].'-'.$matches[2]."'>".$matches[1]." - " .str_replace('_',' ',$matches[2])."</a><br>";
        }

        return view('blog.index',['files' => $fileLinks]);
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
