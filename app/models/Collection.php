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
}
