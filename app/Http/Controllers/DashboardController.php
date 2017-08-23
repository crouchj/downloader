<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller {

	public function index() {
		return View::make('dashboard.index');
	}
}
