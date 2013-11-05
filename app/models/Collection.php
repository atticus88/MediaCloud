<?php

class Collection extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function assets()
	{
		return $this->belongsToMany('Asset');
	}

	public function playlists()
	{
		return $this->belongsToMany('Playlist');
	}

	public function users()
	{
		return $this->belongsToMany('User');
	}
	public static function collection_playlist_asset($id)
	{

		$collection = [];
		$playlists = [];
		$assets = User::find($id)->assets()->get();
		foreach ($assets as $asset) {
			foreach ($asset->playlists()->get() as $playlist) {
				$playlists[$playlist->id] = $asset->toArray();

			}

			
			// $collection[] = $playlist->collections();
		}


		// var_dump($playlists);

		return $playlists;
	}
}
