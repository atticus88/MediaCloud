<?php

class AssetsController extends BaseController {

	/**
	 * Asset Repository
	 *
	 * @var Asset
	 */
	protected $asset;

	public function __construct(Asset $asset)
	{
		// Apply the admin auth filter
		$this->beforeFilter('admin-auth');

		$this->asset = $asset;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$assets = $this->asset->all();

		return View::make('assets.index', compact('assets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('assets.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Asset::$rules);

		if ($validation->passes())
		{
			$this->asset->create($input);

			return Redirect::route('assets.index');
		}

		return Redirect::route('assets.create')
		->withInput()
		->withErrors($validation)
		->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$asset = $this->asset->findOrFail($id);

		return View::make('assets.show', compact('asset'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$asset = $this->asset->find($id);

		if (is_null($asset))
		{
			return Redirect::route('assets.index');
		}

		return View::make('assets.edit', compact('asset'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Asset::$rules);

		if ($validation->passes())
		{
			$asset = $this->asset->find($id);
			$asset->update($input);

			return Redirect::route('assets.show', $id);
		}

		return Redirect::route('assets.edit', $id)
		->withInput()
		->withErrors($validation)
		->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->asset->find($id)->delete();

		return Redirect::route('assets.index');
	}

}
