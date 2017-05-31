<?php namespace App\Http\Controllers;

use App\Services\Activity;
use App\Services\Visitors;
use Carbon\Carbon;

class WelcomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return welcome view
	 */
	public function index()
	{
		$activity = new Visitors();
		$activity->setVisitorInfo();

		return view('welcome');
	}

}
