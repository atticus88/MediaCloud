<?php

class Playlist extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function assets()
	{
		return $this->belongsToMany('Asset');
	}
	public function collections()
	{
		return $this->belongsToMany('Collections');
	}

}
