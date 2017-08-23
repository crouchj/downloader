<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

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

    private function generatePassword($length)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('dashboard.release.index', array('releases' => Release::with(array('artist'))->get()));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $message = session('message');
        return View::make('dashboard.release.create', compact($message));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $adding_new_artist = false;
        $a      = Input::get('artist');
        $new_a  = Input::get('new-val');
        if ((!isset($a) || $a == 'null') && isset($new_a)) {
            Input::merge(array('artist' => 'new-val'));
            $adding_new_artist = true;
        }

        $rules = array(
            'artist'           => 'required',
            'title'          => 'required',
            'release-date'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return View::make('dashboard.release.create')->withErrors($validator);
        }

        $release                    = new Release;
        $release->title             = Input::get('title');
        $release->release_number    = Input::get('release-number');
        $release->release_date      = date("Y-m-d H:i:s", strtotime(Input::get('release-date')));

        // Zip file
        if (Input::hasFile('zipfile')) {
            $zipfile = Input::file('zipfile');
            $filename = $zipfile->getClientOriginalName();
            Input::file('zipfile')->move(upload_path(), $filename);
        }


        if ($adding_new_artist) {
            $new_artist_name        = Input::get('new-val');
            $new_artist             = new Artist;
            $new_artist->name       = $new_artist_name;
            $new_artist->save();

            $artist = Artist::where('name', $new_artist_name)->firstOrFail();
        } else {
            $artist = Artist::find(Input::get('artist'));
        }

        $release->artist()->associate($artist);

        // Generate DL codes?
        if (Input::get('generate-dl-codes') == 'yeah') {
            // DownloadGroup
            $dl_group = new DownloadGroup(Input::get('download-group-title'));

            // Download
            $num_codes        = Input::get('num-codes');
            $num_chars        = Input::get('num-chars');
            $count          = empty($count)     ? 1000  : $count;
            $length         = empty($length)    ? 8     : $length;
            $codes_in_db    = Download::all()->toArray();
            $i                = 0;

            while ($count > 0) {
                $p = self::generatePassword($length);
                if (!in_array($p, $new_codes) && !in_array($p, $codes_in_db)) {
                    $dl = new Download(array(
                        'code'      => $p,
                        'filename'  => Input::get('filename'),
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
        return View::make('dashboard.release.index', array('releases' => Release::all()))->withMessage('Successfully created: <span class="title">' . $release->title . '</span>');
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
    public function update($id)
    {
        if (Request::ajax()) {
            $release                    = Release::find(Input::get('id'));
            $release->title             = Input::get('title');
            $release->release_number    = Input::get('release-number');
            $release->release_date      = date("Y-m-d H:i:s", strtotime(Input::get('release-date')));

            $artist = Artist::find(Input::get('artist'));
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
    public function destroy($id)
    {
        if (Request::ajax()) {
            Release::destroy(Input::get('id'));
            return 1;
        }
    }
}
