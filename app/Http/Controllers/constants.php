<?php

namespace App\Http\Controllers;

class constants
{
    public static $sites = [
        '0' => [
            'id' => '0',
            'url' => 'https://ww.anime4up.com/',
            'LatestEps' => '.page-content-container .episodes-list-content .row div .episodes-card-container',
            'latest_Title' => '.ep-card-anime-title h3 a',
            'latest_img' => '.episodes-card-container .episodes-card .img-responsive',
            'latest_img_attr' => 'src',
            'latest_number' => '.episodes-card .episodes-card-title h3 a',
            'latest_anime_url' => "",
            'ep_url' => '.episodes-card .episodes-card-title h3 a',
            'ep_url_attr' => 'href',
            //Search Settings:
            'search_url' => 'https://ww.anime4up.com/?search_param=animes&s=',
            'search_res' => '.container .anime-list-content .anime-card-container',
            'res_status' => '.anime-card-status a',
            'res_status_attr' => '',
            'res_title' => '.anime-card-title',
            'res_title_attr' => 'data-original-title',
            'res_pic' => '.img-responsive',
            'res_pic_attr' => 'src',
            'res_status_with_attr' => false,
            'res_pic_with_attr' => true,
            'res_title_with_attr' => false,
            'res_url_with_attr' => true,
            'res_url_attr' => "href",
            'res_url' => ".overlay",
            //Anime Details Settings:
            'anime_url' => 'https://ww.anime4up.com/anime/',
            'anime_img' => '.anime-info-container .anime-info-right .anime-thumbnail img',
            'anime_img_with_attr' => true,
            'anime_img_attr' => 'src',
            'anime_title' => '.anime-info-container .anime-info-left .anime-details .anime-details-title',
            'anime_title_attr' => '',
            'anime_title_with_attr' => false,
            'anime_desc' => '.anime-info-container .anime-info-left .anime-details .anime-story',
            'anime_desc_attr' => '',
            'anime_desc_with_attr' => false,
        ],
        '1' => [
            'id' => '1',
            'url' => 'https://animelek.me/',
            'LatestEps' => '',
            'latest_Title' => '',
            'latest_img' => '',
            'latest_img_attr' => '',
            'latest_number' => '',
            'ep_url' => '',
            'ep_url_attr' => '',
            'search_url' => '',
            'search_res' => '',
            'res_status' => '',
        ]
    ];

    public static $epDetails = [
        '0' => [
            'id' => '0',
            'url' => 'https://ww.anime4up.com/',
            'episode_url' => 'https://ww.anime4up.com/episode/',
            'episode_path' => 'ul[id="episode-servers"] li',
            'server_url_path' => 'a',
            'server_url' => 'data-ep-url',
            'server_name_with_attr' => false,
            'server_name_attr_bath' => 'a',
            'server_name_attr' => 'id',
            'server_name_path' => 'a'
        ]
    ];
}
