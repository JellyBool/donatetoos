<?php

namespace App\Http\Controllers;

use App\Repostory;
use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;

class RepostoryController extends Controller
{
    protected $apiUrl = 'https://api.github.com/repos/';

    /**
     * RepostoryController constructor.
     *
     * @param string $apiUrl
     */
    public function __construct()
    {
        $this->middleware('dashboard', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repostories = Repostory::all();
        
        return view('repos.lists', compact('repostories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repostory = $this->fetchRepo($request->get('repo'));
        $this->saveRepo($repostory);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repostory = Repostory::find($id);
        
        return view('repos.show',compact('repostory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function fetchRepo($name)
    {
        $client = new Client();
        $response = $client->get($this->apiUrl . $name);
        return \GuzzleHttp\json_decode($response->getBody());
    }

    protected function saveRepo($repostory)
    {
        $data = [
            'repos_id'               => $repostory->id,
            'name'                   => $repostory->name,
            'full_name'              => $repostory->full_name,
            'repo_url'               => $repostory->html_url,
            'description'            => $repostory->description,
            'repo_updated_at'        => $repostory->updated_at,
            'stars'                  => $repostory->stargazers_count,
            'language'               => $repostory->language,
            'repo_owner_id'          => $repostory->owner->id,
            'repo_owner_name'        => $repostory->owner->login,
            'repo_owner_avatar'      => $repostory->owner->avatar_url,
            'repo_owner_profile_url' => $repostory->owner->html_url,
        ];
        Repostory::create($data);
    }
}
