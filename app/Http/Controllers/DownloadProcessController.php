<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class DownloadProcessController extends Controller
{
    public $message;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $message = session('message');
        return View::make('download')->withMessage($message);
    }

    public function postDownloadForm()
    {
        if (Input::has('downloadId')) {
            $dlId = Input::get('downloadId');
            $download = Download::whereRaw('BINARY code = ?', array($dlId))->first();
            if ($download) {
                // return file
                $basePath = realpath(__DIR__.'/../../files');
                $fileName = $download->filename;

                if (file_exists("$basePath/$fileName")) {
                    Session::forget('message');
                    return Response::download("$basePath/$fileName");
                }
            } else {
                return Redirect::route('processDownloadCode')->withMessage('Invalid download code');
            }
        }
        return self::index();
    }
}
