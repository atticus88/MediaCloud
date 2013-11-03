<?php

class Asset extends Eloquent implements AssetRepository {

	protected $table = 'assets';

	public function getLastAssets($amount)
	{
		// $assets = DB::select("SELECT * FROM assets ORDER BY  created_at DESC LIMIT 0 , $amount");
		$assets = Asset::paginate($amount);
		return $assets;
	}



	public function user()
	{
		return $this->belongsTo('User', 'id');
	}

	public function playlists()
	{
		return $this->belongsTo('Playlist', 'id');
	}

	public function collections()
	{
		return $this->belongsTo('Collection', 'id');
	}


}



?>