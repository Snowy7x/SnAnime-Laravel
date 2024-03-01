<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function HomePage()
    {
        $scrapper = new Scrapper();
        $latest = $scrapper->getLatest();
        if (count($latest) > 20){
            $latest = array_slice($latest, 0, 20);
        }
        $data = ['latest' => $latest];
//        return $latest[count($latest) - 1]->outerHtml();
        return view('pages.index')->with($data);
    }

    public function WatchEpisode(Request $req, $server, $id)
    {
        $scrapper = new Scrapper();
        $servers = $scrapper->getEpisodeDataFromUrl($server, $id);
        $data = ['servers' => $servers];
        return view('pages.watch')->with($data);
    }

    public function Search(Request $request){
        $query = $request->get("q");
        $scrapper = new Scrapper();
        $results = $scrapper->getSearchResults($query, 0);
        $data = ['results' => $results, 'query' => $query];
        return view('pages.search')->with($data);
    }

    public function Anime(Request $request, $server, $name){
        $scrapper = new Scrapper();
        $data = $scrapper->getAnimeDetails($server, $name);
        $details = ["details" => $data];
        return view('pages.details')->with($details);
    }

}
