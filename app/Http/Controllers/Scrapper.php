<?php

namespace App\Http\Controllers;

use Goutte\Client;
use PhpParser\Node\Expr\Array_;
use Symfony\Component\DomCrawler\Crawler;

class Scrapper{

    /** @var Client $client */
    public $client;

    public $latest = [];
    public $ep_temp = [];
    public $search_temp = [];
    public $anime_details = [];

    public function __construct(){
        $this->client = new Client();
    }

    public function getLatest(): array {
        return $this->getLatestFromSite('0');
    }

    public function getLatestFromSite($id) : array {
        $this->latest = [];
        $site = constants::$sites[$id];
        $page = $this->client->request('GET', $site['url']);
        $page->filter($site['LatestEps'])->each(
            function (Crawler $item) use($site, $id) {
                $this->latest[] = [
                    'id' => $id,
                    'title' => $item->filter($site['latest_Title'])->text(),
                    'number' => $item->filter($site['latest_number'])->text(),
                    'image_url' => $item->filter($site['latest_img'])->attr($site['latest_img_attr']),
                    'ep_url' => str_replace(constants::$epDetails[$id]['episode_url'], '', $item->filter($site['ep_url'])->attr($site['ep_url_attr'])),
                ];
            }
        );
        return $this->latest;
    }

    public function getEpisodeDataFromUrl($server, $title) : array {
        $this->ep_temp = [];
        $site = constants::$epDetails[$server];
        $url = $site['episode_url'].urlencode($title);

        $page = $this->client->request('GET', $url);
        $page->filter($site['episode_path'])->each(
            function (Crawler $item) use ($site) {
                $is_attr = $site['server_name_with_attr'];
                $name = '';
                if ($is_attr){
                    $name = $item->filter($site['server_name_attr_bath'])->attr($site['server_name_attr']);
                }else{
                    $name = $item->filter($site['server_name_path'])->text();
                }
                $this->ep_temp[] = [
                    'name' => $name,
                    'url' => $item->filter($site['server_url_path'])->attr($site['server_url']),
                ];
            }
        );

        return $this->ep_temp;
    }

    public function getSearchResults($query, $id) : array {
        $this->search_temp = [];
        $site = constants::$sites[$id];
        $page = $this->client->request('GET', $site['search_url'] . $query);
        $page->filter($site['search_res'])->each(
            function (Crawler $item) use ($id, $site) {
              $title = "";
              if ($site['res_title_with_attr']){
                  $title = $item->filter($site['res_title'])->attr($site['res_title_attr']);
              }else{
                  $title = $item->filter($site['res_title'])->text();
              }
              $img = "";
              if ($site['res_pic_with_attr']){
                  $img = $item->filter($site['res_pic'])->attr($site['res_pic_attr']);
              }else{
                  $img = $item->filter($site['res_pic'])->text();
              }

              $status = "";
              if ($site['res_status_with_attr']){
                  $status = $item->filter($site['res_status'])->attr($site['res_status_attr']);
              }else{
                  $status = $item->filter($site['res_status'])->text();
              }

              $url = "";
              if ($site['res_url_with_attr']){
                  $url = $item->filter($site['res_url'])->attr($site['res_url_attr']);
              }else{
                  $url = $item->filter($site['res_url'])->text();
              }

              $this->search_temp[] = [
                  'id' => $id,
                  'title' => $title,
                  'img' => $img,
                  'status' => $status,
                  'url' => str_replace($site['anime_url'], "", $url)
              ];
          }
        );
        return $this->search_temp;
    }

    public function getAnimeDetails($server, $title) : array {
        $this->anime_details = [];
        $site = constants::$sites[$server];
        $page = $this->client->request('GET', $site['anime_url'] . $title);


        if ($site['anime_img_with_attr']){
            $this->anime_details['img'] = $page->filter($site['anime_img'])->attr($site['anime_img_attr']);
        }else{
            $this->anime_details['img'] = $page->filter($site['anime_img'])->text();
        }

        if ($site['anime_title_with_attr']){
            $this->anime_details['title'] = $page->filter($site['anime_title'])->attr($site['anime_title_attr']);
        }else{
            $this->anime_details['title'] = $page->filter($site['anime_title'])->text();
        }

        if ($site['anime_desc_with_attr']){
            $this->anime_details['desc'] = $page->filter($site['anime_desc'])->attr($site['anime_desc_attr']);
        }else{
            $this->anime_details['desc'] = $page->filter($site['anime_desc'])->text();
        }
        return $this->anime_details;
    }
}
