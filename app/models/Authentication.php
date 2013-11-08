<?php

/**
 * An Eloquent Model: 'Authentication'
 *
 * @property-read \User $user
 */
class Authentication extends Eloquent {

	/**
	 *
	 *
	 * @return
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}
