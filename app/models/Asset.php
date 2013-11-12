<?php

/**
 * An Eloquent Model: 'Asset'
 *
 * @property integer $id
 * @property string $alpha_id
 * @property string $title
 * @property string $description
 * @property string $filepath_original
 * @property string $filepath_transcoded
 * @property string $url_original
 * @property string $url_transcoded
 * @property string $type
 * @property string $status
 * @property string $permissions
 * @property string $tags
 * @property integer $views
 * @property integer $uploaded_by
 * @property \Carbon\Carbon $last_viewed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 * @property-read \Playlist $playlists
 * @property-read \Collection $collections
 */
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

	public function cpa()
	{
		return $this->belongsTo('CollectionPlaylistAsset', 'id');
	}


}



?>