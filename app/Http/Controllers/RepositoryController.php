<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Repository;

class RepositoryController extends Controller
{

    public function updateRepos()
    {
        
        $repositories = array();


        $urls = array(
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=1",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=2",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=3",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=4",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=5",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=6",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=7",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=8",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=9",
            "https://api.github.com/search/repositories?q=language:php&type=public&sort=stars&order=desc&per_page=100&page=10"
        );

        $multiCurl = array();
        $result = array();

        $mh = curl_multi_init();
        
        foreach ($urls as $url) {
            $multiCurl[$url] = curl_init();
            curl_setopt($multiCurl[$url], CURLOPT_URL, $url);
            curl_setopt($multiCurl[$url], CURLOPT_HTTPHEADER, [
                "User-Agent: PHP 8.2 App",
                "Accept: application/vnd.github+json",
                "X-GitHub-Api-Version: 2022-11-28",
                "Authorization: Bearer " . env('GITHUB_TOKEN')
            ]
        );

        curl_setopt($multiCurl[$url], CURLOPT_RETURNTRANSFER, 1);
        curl_multi_add_handle($mh, $multiCurl[$url]);
        }
            $index=null;
        do {
            curl_multi_exec($mh,$index);
        } while($index > 0);

        foreach($multiCurl as $k => $ch) {
            $result[$k] = curl_multi_getcontent($ch);
            curl_multi_remove_handle($mh, $ch);
        }
        curl_multi_close($mh);

        // dd($result);


        // Add to db
        foreach($urls as $url) {
            $repositories = json_decode($result[$url])->items;
            // var_dump($repo);
            foreach($repositories as $repo) {
                Repository::updateOrCreate(
                    ['repo_id' => $repo->id],
                    [
                        'name' => $repo->name,
                        'owner' => $repo->owner->login,
                        'url' => $repo->html_url,
                        'repo_create' => date('Y-m-d h:i:s', strtotime($repo->created_at)),
                        'last_push' => date('Y-m-d h:i:s', strtotime($repo->pushed_at)),
                        'description' => $repo->description,
                        'stars' => $repo->stargazers_count
                    ]);
            }
        }

        return redirect()->route('home')->with('message', 'Repositories updated successfully');
    }
}
