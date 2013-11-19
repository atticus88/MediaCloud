<?php

/**
 * An Eloquent Model: 'CollectionPlaylistAsset'
 *
 * @property integer $id
 * @property integer $collection_id
 * @property integer $playlist_id
 * @property integer $asset_id
 */
class CollectionPlaylistAsset extends Eloquent {
	protected $guarded = array();
	protected $table = 'collection_playlist_asset';
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


	public function get_cpa_by_user_id($id)
	{
		$data =  DB::select(DB::raw("SELECT
			collection_playlist_asset.id,
			collection_playlist_asset.collection_id,
			collection_playlist_asset.playlist_id,
			collection_playlist_asset.asset_id

			FROM collection_playlist_asset

			LEFT JOIN asset_user
			ON collection_playlist_asset.asset_id = asset_user.asset_id
			WHERE asset_user.user_id = $id" ));

		if (count($data) == 0){
			return ["results" => 0, "description"=>"No Results returned", "user" =>User::find($id) ? User::find($id)->id:null];
		}

		$cpa = (Object) array();
		// $cpa->user_id = $id;

		foreach ($data as $v) {
			// var_dump($v->collection_id);
			$cpa->collections[$v->collection_id] = new stdClass;
			$cpa->collections[$v->collection_id]->name = Collection::find($v->collection_id)['name'];;
		}

		foreach ($data as $v) {
			// var_dump($v->collection_id);
			if ($v->playlist_id) {
				// if playlist
				$cpa->collections[$v->collection_id]->playlists = array();
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id] = new stdClass;
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->id = $v->playlist_id;
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->name = Playlist::find($v->playlist_id)['name'];
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->description = Playlist::find($v->playlist_id)['description'];
				// end if playlist
			}
			else{
				// if asset not playlist
				$cpa->collections[$v->collection_id]->assets = array();
				$cpa->collections[$v->collection_id]->assets[$v->asset_id] = new stdClass;
				$cpa->collections[$v->collection_id]->assets[$v->asset_id]->id = $v->asset_id;
				$cpa->collections[$v->collection_id]->assets[$v->asset_id]->name = Asset::find($v->asset_id)['title'];
				$cpa->collections[$v->collection_id]->assets[$v->asset_id]->description = Asset::find($v->asset_id)['description'];
				// end if asset not playlist
			}
		}

		foreach ($data as $v) {
			// var_dump($v->collection_id);
			if ($v->playlist_id) {
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id] = new stdClass;
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id]->id = $v->asset_id;
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id]->name = Asset::find($v->asset_id)['title'];
				$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id]->description = Asset::find($v->asset_id)['description'];
			}

		}


		$collections = current($cpa);
		if (count($collections) && is_array($collections)) {
			return array_values($collections);
		}

	}
}

