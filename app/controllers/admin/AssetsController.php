<?php namespace Controllers\Admin;

use AssetRepository;
use AdminController;
use Input;
use Lang;
use Asset;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;

class AssetsController extends AdminController {


	public function __construct(AssetRepository $asset) {
		$this->asset = $asset;
	}
	/**
	 * Show a list of all the assets.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Grab all the assets
		$assets = $this->asset->getLastAssets(15);

		// die(var_dump($assets));
		// Show the page
		return View::make('backend/media_assets/index', compact('assets'));
	}

	/**
	 * Blog post create.
	 *
	 * @return View
	 */
	public function getCreate()
	{
		// Show the page
		return View::make('backend/media_assets/create');
	}

	/**
	 * Blog post create form processing.
	 *
	 * @return Redirect
	 */
	public function postCreate()
	{
		// Declare the rules for the form validation
		$rules = array(
			// 'id' => 'required',
			'title' => 'required',
			'description' => 'required',
			'filepath' => 'required',
			// 'filename' => 'required',
			// 'transcoded_url' => 'required',
			// 'thumbnail_url' => 'required',
			// 'url' => 'required',
			// 'type' => 'required',
			// 'status' => 'required',
			// 'tags' => 'required',
			// 'views' => 'required',
			// 'last_viewed' => 'required',
			// 'created_at' => 'required',
			// 'updated_at' => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Create a new asset
		$asset = new Asset;

		// Update the asset data
		$asset->title				= e(Input::get('title'));
		$asset->description			= e(Input::get('description'));
		$asset->filepath			= e(Input::get('filepath'));
		$asset->filename			= e(Input::get('filename'));
		$asset->transcoded_url		= e(Input::get('transcoded_url'));
		$asset->thumbnail_url		= e(Input::get('thumbnail_url'));
		$asset->url					= e(Input::get('url'));
		$asset->type				= e(Input::get('type'));
		$asset->status				= e(Input::get('status'));
		$asset->tags				= e(Input::get('tags'));
		$asset->views				= e(Input::get('views'));

		// Was the asset created?
		if($asset->save())
		{
			// Redirect to the new asset page
			return Redirect::to("admin/assets")->with('success', Lang::get('admin/assets/message.create.success'));
		}

		// Redirect to the asset create page
		return Redirect::to('admin/assets/create')->with('error', Lang::get('admin/assets/message.create.error'));
	}

	/**
	 * Blog post update.
	 *
	 * @param  int  $assetId
	 * @return View
	 */
	public function getEdit($assetId = null)
	{
		// Check if the asset exists
		if (is_null($asset = Asset::find($assetId)))
		{
			// Redirect to the blogs management page
			return Redirect::to('admin/media_assets')->with('error', Lang::get('admin/assets/message.does_not_exist'));
		}

		// Show the page
		return View::make('backend/media_assets/edit', compact('asset'));
	}

	/**
	 * Blog Post update form processing page.
	 *
	 * @param  int  $assetId
	 * @return Redirect
	 */
	public function postEdit($assetId = null)
	{
		// Check if the assets exists
		if (is_null($asset = Asset::find($assetId)))
		{
			// Redirect to the assets management page
			return Redirect::to('admin/assets')->with('error', Lang::get('admin/assets/message.does_not_exist'));
		}


		// Declare the rules for the form validation
		$rules = array(
			'title' => 'required',
			// 'description' => 'required',
			// 'filepath' => 'required',
			// 'filename' => 'required',
			// 'transcoded_url' => 'required',
			// 'thumbnail_url' => 'required',
			// 'url' => 'required',
			// 'type' => 'required',
			// 'status' => 'required',
			// 'tags' => 'required',
			// 'views' => 'required',
			// 'last_viewed' => 'required',
			// 'created_at' => 'required',
			// 'updated_at' => 'required'
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Update the asset data
		$asset->title				= e(Input::get('title'));
		$asset->description			= e(Input::get('description'));
		$asset->filepath			= e(Input::get('filepath'));
		$asset->filename			= e(Input::get('filename'));
		$asset->transcoded_url		= e(Input::get('transcoded_url'));
		$asset->thumbnail_url		= e(Input::get('thumbnail_url'));
		$asset->url					= e(Input::get('url'));
		$asset->type				= e(Input::get('type'));
		$asset->status				= e(Input::get('status'));
		$asset->tags				= e(Input::get('tags'));
		$asset->views				= e(Input::get('views'));
		// $asset->last_viewed			= e(Input::get('last_viewed'));
		// $asset->created_at			= e(Input::get('created_at'));
		// $asset->updated_at			= e(Input::get('updated_at'));



		// Was the asset updated?
		if($asset->save())
		{
			// Redirect to the new asset page
			return Redirect::to("admin/assets")->with('success', Lang::get('admin/assets/message.update.success'));
		}

		// Redirect to the assets post management page
		return Redirect::to("admin/assets/$assetId/edit")->with('error', Lang::get('admin/assets/message.update.error'));
	}

	/**
	 * Delete the given asset.
	 *
	 * @param  int  $assetId
	 * @return Redirect
	 */
	public function getDelete($assetId)
	{
		// Check if the asset exists
		if (is_null($asset = Asset::find($assetId)))
		{
			// Redirect to the assets management page
			return Redirect::to('admin/assets')->with('error', Lang::get('admin/assets/message.not_found'));
		}

		// Delete the asset
		$asset->delete();

		// Redirect to the assets management page
		return Redirect::to('admin/assets')->with('success', Lang::get('admin/assets/message.delete.success'));
	}

}
