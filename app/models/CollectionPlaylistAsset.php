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
			WHERE asset_user.user_id = $id"));

		// return $data;

		// $data = CollectionPlaylistAsset::all();

		// var_dump($data);

		$cpa = (Object) array(
			'user_id'=>$id,
			'collections' => array()
		);


		$cpa->collections[] = new stdClass();
		$cpa->collections[0]->name = "Collection - Math Department";

		$cpa->collections[0]->playlists = array();
		$cpa->collections[0]->playlists[] = new stdClass();
		$cpa->collections[0]->playlists[0]->name = "playlist1";
		$cpa->collections[0]->playlists[0]->assets = array();

		$cpa->collections[0]->playlists[0]->assets[] = new stdClass();
		$cpa->collections[0]->playlists[0]->assets[0]->id = 1;
		$cpa->collections[0]->playlists[0]->assets[0]->name = "Video 1";


		$cpa->collections[0]->playlists[0]->assets[] = new stdClass();
		$cpa->collections[0]->playlists[0]->assets[1]->id = 2;
		$cpa->collections[0]->playlists[0]->assets[1]->name = "Video 2";

		// -----------------------------------------------------------------//

		$cpa->collections[0]->playlists[] = new stdClass();
		$cpa->collections[0]->playlists[1]->name = "playlist2";
		$cpa->collections[0]->playlists[1]->assets = array();

		$cpa->collections[0]->playlists[1]->assets[] = new stdClass();
		$cpa->collections[0]->playlists[1]->assets[0]->id = 3;
		$cpa->collections[0]->playlists[1]->assets[0]->name = "Video 3";

		$cpa->collections[0]->playlists[1]->assets[] = new stdClass();
		$cpa->collections[0]->playlists[1]->assets[1]->id = 4;
		$cpa->collections[0]->playlists[1]->assets[1]->name = "Video 4";



		$cpa->collections[0]->assets[] = new stdClass();
		$cpa->collections[0]->assets[0]->id = 10;
		$cpa->collections[0]->assets[0]->name = "video10";


		echo json_encode($cpa);
		die();

		$i = 0;
		$j = 0;


		// $collections = array();
		// $playlists = array();
		// $assets = array();
		// foreach ($data as $item) {
		// 	$collections[] = $item->collection_id;
		// 	$playlists[] = $item->playlist_id;
		// 	$assets[] = $item->asset_id;
		// }
		// var_dump(array_unique($collections));
		// var_dump(array_unique($playlists));
		// var_dump(array_unique($assets));

		// // var_dump(array_unique($collections));
		// // var_dump(array_unique($playlists));
		// // var_dump(array_unique($assets));
		// die();
		// $collection_count = count(array_unique($collections));
		// $playlists_count = count(array_unique($playlists));
		// $assets_count = count(array_unique($assets));

		// for ($i=0; $i < $collection_count; $i++) {
		// 	var_dump($collections[$i]);
		// 	echo  $i . "<br>";
		// }
		// for ($j=0; $j < $playlists_count; $j++) {

		// 	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$j."<br>";
		// }
		// for ($k=0; $k < $assets_count; $k++) {
		// 	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$k."<br>";
		// }






		/*/
		foreach ($data as $items) {
				// var_dump($i,$items);
				// var_dump('hey',count($cpa->collections));

				$cpa->collections[count($cpa->collections)-1];
				$cpa->collections[count($cpa->collections)-1]->name = Collection::find($items->collection_id)['name'];
				$cpa->collections[count($cpa->collections)-1]->playlists = array(new stdClass());
				$cpa->collections[count($cpa->collections)-1]->assets = array();



			foreach ($items as $key => $value) {
				if($items->playlist_id)
					// $playlist = new stdClass();
					// $cpa->collections[$i]->playlists = array($playlist);// Playlist::find($items->playlist_id)['name'];

				if($items->asset_id)
					// $cpa->collections[$i]->assets = Asset::find($items->asset_id)['name'];
				// var_dump($key,$value);
				// var_dump($i . ' ' . $j . ' ' . $key. ' ' .$value);
				// if ($key !== "playlist_id" && $value !== 0 ) {
				// 	//is asset with a playlist
				// 	$cpa->collections[$i]['playlists'] = array("id"=>$value);
				// }
				$j++;
			}
				$i++;
		}
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
	}
}
