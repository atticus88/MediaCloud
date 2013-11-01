<?php namespace Controllers\Admin;

use AdminController;
use Input;
use Lang;
use Asset;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;


class SettingsController extends AdminController {

	/**
	 * Show the administration dashboard page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// echo "hey";
		// Show the page
		return View::make('backend/layouts/settings');
	}

	public function postIndex()
	{
	}

}
