<?php

class SettingsController extends PermissionsController {

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
