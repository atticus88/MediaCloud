<?php

class DashboardController extends PermissionsController {

	/**
	 * Show the administration dashboard page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Show the page
		return View::make('backend/dashboard');
	}

}
