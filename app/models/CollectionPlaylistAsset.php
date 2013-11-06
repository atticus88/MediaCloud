<?php

class CollectionPlaylistAsset extends Eloquent {
	protected $guarded = array();

	public static $rules = array();
	public $timestamps = false;

	public function add($collection_id,$playlist_id,$asset_id)
	{

		// $playlist_id = $playlist_id == null ? $playlist_id : 0;

		DB::table('collection_playlist_asset')->insert(
			array(
				'collection_id' => $collection_id,
				'playlist_id' => $playlist_id,
				'asset_id' => $asset_id,
				)
			);
	}

	public function get_cpa_by_id($id)
	{
		return DB::select(DB::raw("SELECT 	collection_playlist_asset.id,
											collection_playlist_asset.collection_id,
											collection_playlist_asset.playlist_id,
											collection_playlist_asset.asset_id

											FROM collection_playlist_asset


											LEFT JOIN asset_user
											ON collection_playlist_asset.asset_id= asset_user.asset_id
											WHERE asset_user.user_id = $id"));
	}
}
