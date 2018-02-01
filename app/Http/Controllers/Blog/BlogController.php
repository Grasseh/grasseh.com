<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Parsedown;
use Spatie\Feed\FeedItem;
use Symfony\Component\Yaml\Yaml;

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
			$fileLinks[] = "<a href='/blog/".str_slug($matches[2])."'>".$matches[1]." - " .str_replace('_',' ',$matches[2])."</a><br>";
		}

		return view('blog.index',['files' => $fileLinks]);
	}

	public function showBySlug($slug)
	{
		$metadata = file_get_contents("../resources/blog/metadata.yaml");
		$parsed_metadata = Yaml::parse($metadata);

		$entry_data = array_filter($parsed_metadata['posts'], function($array) use ($slug) {
			return (str_slug($array['title']) == ($slug));
		});

		$entry = array_pop($entry_data);

		//Find file
		$no = glob("../resources/blog/entries/*" . $entry['id'] . "-*.md");

		//Throw 404 if file is not found or does not exist
		if(count($no) == 0){
			abort(404);
		}
		$data = file_get_contents($no[0]);
		$Parsedown = new Parsedown();

		return view('blog.entry',['name' => $entry["title"],'description' => $entry['description'], 'content' => $Parsedown->text($data)]);
	}

	public function getFeedItems(){
		$metadata = file_get_contents("../resources/blog/metadata.yaml");
		$parsed_metadata = Yaml::parse($metadata);

		$items = [];
		foreach($parsed_metadata['posts'] as $id => $data){
			$items[] = FeedItem::create()
				->id($id)
				->title($data["title"])
				->summary($data["description"])
				->updated(new Carbon($data["date"], "America/New_York"))
				->link("/blog/" . $id . "-" . str_slug($data["title"]))
				->author("Steve Gagné");
		}
		return array_reverse($items);
	}
}
