<?php

class Asset extends Eloquent implements AssetRepository {

	protected $table = 'media_assets';

	public function getLastAssets($amount)
	{
		// $assets = DB::select("SELECT * FROM  media_assets ORDER BY  created_at DESC LIMIT 0 , $amount");
		$assets = Asset::paginate(3);
		return $assets;
	}



	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}



?>