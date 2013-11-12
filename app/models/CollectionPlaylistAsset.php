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

		// return $data;

		// $data = CollectionPlaylistAsset::all();

		// var_dump($data);

		// $collections = array();
		// $playlists = array();
		// $assets = array();

		// foreach ($data as $item) {
		//   $collections[] = $item->collection_id;
		//   $playlists[] = $item->playlist_id;
		//   $assets[] = $item->asset_id;
		// }

		// var_dump($collections);
		// // var_dump($playlists);
		// // var_dump($assets);

		// var_dump(array_unique($collections));
		// // var_dump(array_unique($playlists));
		// // var_dump(array_unique($assets));
		// die();

		$cpa = (Object) array();
		$cpa->user_id = $id;

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
				// if ($v->playlist_id == 0) {
				// 	$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets = array();
				// 	$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id] = new stdClass;
				// 	$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id]->id = $v->asset_id;
				// 	$cpa->collections[$v->collection_id]->playlists[$v->playlist_id]->assets[$v->asset_id]->name = Asset::find($v->asset_id)['title'];
				// }
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

		// $data = json_encode($data);
		// var_dump($data);
		// echo "<pre>";
		// print_r($cpa);
		return json_encode($cpa);
		// $demo = json_decode('{"user_id":2,"collections":[{"name":"Collection - Math Department","playlists":[{"name":"playlist1","assets":[{"id":1,"name":"Video 1"},{"id":2,"name":"Video 2"}]},{"name":"playlist2","assets":[{"id":3,"name":"Video 3"},{"id":4,"name":"Video 4"}]}],"assets":["video10"]}]}');
		// echo "===================================================================================================<br>";
		// print_r($demo);
		// print_r($cpa->collections[0]->playlists[0]->assets[0]->id);//->assets[0]);
		// print_r($demo->collections[0]->playlists[0]->assets[0]->id);//->assets[0]);
	}
}
