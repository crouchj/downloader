<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Artist;
use App\Release;

class ArtistController extends Controller {


    private function getAllReleasesForSelectList()
    {
        return Release::orderBy('title')->get()->mapWithKeys(function ($release) {
            return [$release['id'] => $release['title']];
        })->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.artist.index', ['artists' => Artist::with('releases')->get(), 'allReleases' => $this->getAllReleasesForSelectList()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.artist.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $artist = new Artist;
        $artist->name = $request->input('name');

        $artist->save();
        $release_ids = $request->input('releaseIds');
        if ($release_ids && $release_ids != 'false') {
            // associate all releases with this artist
            $releases = Release::find($release_ids);
            foreach ($releases as $release) {
                $release->artist()->associate($artist);
                $release->save();
            }
        }

        if (Request::ajax()) {
            return 1;
        }
        // redirect
        return view('dashboard.artist.index', array('releases' => Release::all()))->withMessage('Successfully added: <span class="artist">' . $artist->name . '</span>');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (Request::ajax()) {
            $artist  = Artist::find($request->input('id'));
            $artist->name = $request->input('name');

            $artist->save();

            return 1;
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        if (Request::ajax()) {
            Artist::destroy($request->input('id'));
            return 1;
        }
    }


}
