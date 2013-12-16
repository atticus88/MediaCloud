<?php

/**
 * An Eloquent Model: 'Collection'
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Asset[] $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Playlist[] $playlists
 * @property-read \Illuminate\Database\Eloquent\Collection|\User[] $users
 */
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

		$collection = array();
		$playlists = array();
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
