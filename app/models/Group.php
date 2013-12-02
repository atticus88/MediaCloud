<?php

use Cartalyst\Sentry\Groups\Eloquent\Group as SentryGroupModel;

/**
 * An Eloquent Model: 'Group'
 *
 * @property integer $id
 * @property string $name
 * @property string $permissions
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentry\Users\Eloquent\User[] $users
 */
class Group extends SentryGroupModel {

}
