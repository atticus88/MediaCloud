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

		$cpa = (Object) array(
			'user_id'=>$id,
			'collections' => array()
		);


		// $cpa->collections[] = new stdClass();
		// $cpa->collections[0]->name = "Collection - Math Department";

		// // -----------------------------------------------------------------//

		// $cpa->collections[0]->playlists = array();
		// $cpa->collections[0]->playlists[] = new stdClass();
		// $cpa->collections[0]->playlists[0]->name = "playlist1";
		// $cpa->collections[0]->playlists[0]->assets = array();

		// $cpa->collections[0]->playlists[0]->assets[] = new stdClass();
		// $cpa->collections[0]->playlists[0]->assets[0]->id = 1;
		// $cpa->collections[0]->playlists[0]->assets[0]->name = "Video 1";


		// $cpa->collections[0]->playlists[0]->assets[] = new stdClass();
		// $cpa->collections[0]->playlists[0]->assets[1]->id = 2;
		// $cpa->collections[0]->playlists[0]->assets[1]->name = "Video 2";

		// // -----------------------------------------------------------------//

		// $cpa->collections[0]->playlists[] = new stdClass();
		// $cpa->collections[0]->playlists[1]->name = "playlist2";
		// $cpa->collections[0]->playlists[1]->assets = array();

		// $cpa->collections[0]->playlists[1]->assets[] = new stdClass();
		// $cpa->collections[0]->playlists[1]->assets[0]->id = 3;
		// $cpa->collections[0]->playlists[1]->assets[0]->name = "Video 3";

		// $cpa->collections[0]->playlists[1]->assets[] = new stdClass();
		// $cpa->collections[0]->playlists[1]->assets[1]->id = 4;
		// $cpa->collections[0]->playlists[1]->assets[1]->name = "Video 4";



		// $cpa->collections[0]->assets[] = new stdClass();
		// $cpa->collections[0]->assets[0]->id = 10;
		// $cpa->collections[0]->assets[0]->name = "video10";


		// echo json_encode($cpa);
		// die();






		//*/
		foreach ($data as $key => $values) {
				// var_dump($values->collection_id);
				$cpa->collections[$values->collection_id] = new stdClass();
				$cpa->collections[$values->collection_id]->id = $values->collection_id;
				$cpa->collections[$values->collection_id]->name = Collection::find($values->collection_id)['name'];

				if (!property_exists($cpa->collections[$values->collection_id], "playlists")) {
					$cpa->collections[$values->collection_id]->playlists = array();
				}

				if (!property_exists($cpa->collections[$values->collection_id], "assets")) {
					$cpa->collections[$values->collection_id]->assets = array();
				}


				var_dump($values->collection_id . ' ' .$values->playlist_id);
				if($values->playlist_id){
					// var_dump($values->playlist_id);
					if (!array_key_exists($values->playlist_id, $cpa->collections[$values->collection_id]->playlists)) {
						$cpa->collections[$values->collection_id]->playlists[$values->playlist_id] = new stdClass();
					}

					// $cpa->collections[$values->collection_id]->playlists[$values->playlist_id]->id = $values->playlist_id;
					// $cpa->collections[$values->collection_id]->playlists[$values->playlist_id]->name = Playlist::find($values->playlist_id)['name'];
					// $cpa->collections[$values->collection_id]->playlists[$values->playlist_id]->description = Playlist::find($values->playlist_id)['description'];

					// if (!array_key_exists($values->asset_id, $cpa->collections[$values->collection_id]->playlists[$values->playlist_id])) {
					// 	$cpa->collections[$values->collection_id]->playlists[$values->playlist_id]->assets[$values->asset_id] = new stdClass();
					// }
					// $cpa->collections[$values->collection_id]->playlists[$values->playlist_id]->assets[$values->asset_id]->id = $values->asset_id;
					// $cpa->collections[$values->collection_id]->playlists[$values->playlist_id]->assets[$values->asset_id]->name = Asset::find($values->asset_id)['title'];;
				}
				// else{
				// 	// var_dump($values->asset_id);
				// 	$cpa->collections[$values->collection_id]->assets[$values->asset_id] = new stdClass();
				// 	$cpa->collections[$values->collection_id]->assets[$values->asset_id]->id = $values->asset_id;
				// 	$cpa->collections[$values->collection_id]->assets[$values->asset_id]->name = Asset::find($values->asset_id)['title'];
				// }

		}
		// die();
		//*/


		// $data = json_encode($data);
		// var_dump($data);
		echo "<pre>";
		print_r($cpa);
		// return json_encode($cpa);
		$demo = json_decode('{"user_id":2,"collections":[{"name":"Collection - Math Department","playlists":[{"name":"playlist1","assets":[{"id":1,"name":"Video 1"},{"id":2,"name":"Video 2"}]},{"name":"playlist2","assets":[{"id":3,"name":"Video 3"},{"id":4,"name":"Video 4"}]}],"assets":["video10"]}]}');
		echo "===================================================================================================<br>";
		print_r($demo);
		// print_r($cpa->collections[0]->playlists[0]->assets[0]->id);//->assets[0]);
		// print_r($demo->collections[0]->playlists[0]->assets[0]->id);//->assets[0]);
	}
}
