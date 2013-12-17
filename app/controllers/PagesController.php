<?php

class PagesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function help()
	{
        return View::make('backend.pages.help');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function faq()
	{
        return View::make('backend.pages.faq');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function terms()
	{
		return View::make('backend.pages.terms-of-service');	
	}

	public function privacy()
	{
		return View::make('backend.pages.privacy-policy');	
	}







	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('help.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('help.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
