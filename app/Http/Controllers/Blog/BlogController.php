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
        $metadata = file_get_contents("../resources/blog/metadata.yaml");
        $parsed_metadata = Yaml::parse($metadata);

        foreach($parsed_metadata['posts'] as $data){
            $title = $data["title"];
            $slug = str_slug($title);
            $date = $data["date"];
            $id = $data['id'];
            $fileLinks[] = sprintf("<a href='/blog/%s'>%d - %s - %s</a>",$slug,$id,$title,$date);
        }

        return view('blog.index',['files' => array_reverse($fileLinks)]);
    }

    public function showBySlug($slug)
    {
        $metadata = file_get_contents("../resources/blog/metadata.yaml");
        $parsed_metadata = Yaml::parse($metadata);

        $entry_data = array_filter($parsed_metadata['posts'], function($array) use ($slug) {
            return (str_slug($array['title']) == ($slug));
        });

        //Throw 404 if no entry matches
        if(count($entry_data) == 0){
            abort(404);
        }

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
                ->link("/blog/" . str_slug($data["title"]))
                ->author("Steve Gagné");
        }
        return array_reverse($items);
    }
}
