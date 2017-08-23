<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ArtistController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('dashboard.artist.index', array('artists' => Artist::with('releases')->get()));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$message = session('message');
		return View::make('dashboard.artist.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return View::make('dashboard.artist.create')->withErrors($validator);
        }

		$artist 		= new Artist;
		$artist->name 	= Input::get('name');

		$artist->save();
		$release_ids	= Input::get('releaseIds');
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
        return View::make('dashboard.artist.index', array('releases' => Release::all()))->withMessage('Successfully added: <span class="artist">' . $artist->name . '</span>');
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
			$artist 		= Artist::find(Input::get('id'));
            $artist->name   = Input::get('name');

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
	public function destroy($id)
	{
		if (Request::ajax()) {
			Artist::destroy(Input::get('id'));
			return 1;
		}
	}


}
