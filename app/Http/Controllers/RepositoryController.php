<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Repository;

class RepositoryController extends Controller
{
    public function updateRepos()
    {   

        $context = stream_context_create(
            array(
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );
        $url = "https://api.github.com/search/repositories?q=language:php&order=desc&sort=stars&per_page=100&page=";
        
        // $json = file_get_contents($url, false, $context);
        // $page = json_decode($json);
        // $items = $page->items;
        // var_dump($page);

        for ($pageCounter = 1; $pageCounter <= 10; $pageCounter++) {
            $json = file_get_contents($url . $pageCounter, false, $context);
            $page = json_decode($json);
            $items = $page->items;

            Repository::upsert(collect($items)->map(function($item) {
                return [
                    'repo_id'=>$item->id,
                    'name'=>$item->name,
                    'owner'=>$item->owner->login,
                    'url'=>$item->html_url,
                    'repo_create'=>$item->created_at,
                    'last_push'=>$item->pushed_at,
                    'description'=>$item->description,
                    'stars'=>$item->stargazers_count,
                ];
            })->toArray(), ['repo_id'], ['name','owner','url','repo_create','last_push','description','stars']);
        }

        // return redirect()->route('home');
    }
}
