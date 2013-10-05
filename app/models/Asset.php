<?php

class Asset extends Eloquent implements AssetRepository {


	public function getLastAssets($amount)
	{
		return "Last " . $amount . " Assets";
	}

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}



 ?>