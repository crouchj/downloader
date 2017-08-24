<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Release;
use App\Artist;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    private function generateCode($l)
    {
        $length        = $l;
        $vowels    = 'aeuyAEUY23456789';
        $consonants = 'bdghjmnpqrstvzBDGHJLMNPQRSTVWXZ';

        $code = '';
        $salt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($salt == 1) {
                $code .= $consonants[(rand() % strlen($consonants))];
                $salt = 0;
            } else {
                $code .= $vowels[(rand() % strlen($vowels))];
                $salt = 1;
            }
        }

        return $code;
    }

    private function getAllArtistsForSelectList()
    {
        return Artist::orderBy('name')->get()->mapWithKeys(function ($artist) {
            return [$artist['id'] => $artist['name']];
        })->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.release.index', ['releases' => Release::with(['artist'])->get(), 'allArtists' => $this->getAllArtistsForSelectList()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.release.create', ['allArtists' => $this->getAllArtistsForSelectList()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $adding_new_artist = false;
        $a      = $request->input('artist');
        $new_a  = $request->input('new-val');
        if ((!isset($a) || $a == 'null') && isset($new_a)) {
            Input::merge(array('artist' => 'new-val'));
            $adding_new_artist = true;
        }

        $this->validate($request, [
            'artist'        => 'required',
            'title'         => 'required',
            'release-date'  => 'required'
        ]);

        $release                    = new Release;
        $release->title             = $request->input('title');
        $release->release_number    = $request->input('release-number');
        $release->release_date      = date("Y-m-d H:i:s", strtotime($request->input('release-date')));

        // Zip file
        if (Input::hasFile('zipfile')) {
            $zipfile = Input::file('zipfile');
            $filename = $zipfile->getClientOriginalName();
            Input::file('zipfile')->move(upload_path(), $filename);
        }


        if ($adding_new_artist) {
            $new_artist_name        = $request->input('new-val');
            $new_artist             = new Artist;
            $new_artist->name       = $new_artist_name;
            $new_artist->save();

            $artist = Artist::where('name', $new_artist_name)->firstOrFail();
        } else {
            $artist = Artist::find($request->input('artist'));
        }

        $release->artist()->associate($artist);

        // Generate DL codes?
        if ($request->input('generate-dl-codes') == 'yeah') {
            // DownloadGroup
            $dl_group = new DownloadGroup($request->input('download-group-title'));

            // Download
            $num_codes        = $request->input('num-codes');
            $num_chars        = $request->input('num-chars');
            $count          = empty($count)     ? 1000  : $count;
            $length         = empty($length)    ? 8     : $length;
            $codes_in_db    = Download::all()->toArray();
            $i                = 0;

            while ($count > 0) {
                $p = $this->generateCode($length);
                if (!in_array($p, $new_codes) && !in_array($p, $codes_in_db)) {
                    $dl = new Download(array(
                        'code'      => $p,
                        'filename'  => $request->input('filename'),
                    ));
                    $dl->artist()->associate($artist);
                    $dl->release()->associate($release);
                    $i++;
                    $count--;
                }
            }
        }

        $release->save();


        if (Request::ajax()) {
            return 1;
        }
        // redirect
        return view('dashboard.release.index', array('releases' => Release::all()))->withMessage('Successfully created: <span class="title">' . $release->title . '</span>');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
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
            $release                    = Release::find($request->input('id'));
            $release->title             = $request->input('title');
            $release->release_number    = $request->input('release-number');
            $release->release_date      = date("Y-m-d H:i:s", strtotime($request->input('release-date')));

            $artist = Artist::find($request->input('artist'));
            if ($artist) {
                $release->artist()->associate($artist);
            }

            $release->save();

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
            Release::destroy($request->input('id'));
            return 1;
        }
    }
}
