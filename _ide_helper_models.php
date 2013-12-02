<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace {
/**
 * An Eloquent Model: 'Asset'
 *
 * @property integer $id
 * @property string $alpha_id
 * @property string $title
 * @property string $description
 * @property string $filepath_original
 * @property string $filepath_transcoded
 * @property string $url_original
 * @property string $url_transcoded
 * @property string $type
 * @property string $status
 * @property string $permissions
 * @property string $tags
 * @property integer $views
 * @property integer $uploaded_by
 * @property \Carbon\Carbon $last_viewed
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 * @property-read \Playlist $playlists
 * @property-read \Collection $collections
 */
	class Asset {}
}

namespace {
/**
 * An Eloquent Model: 'Authentication'
 *
 * @property-read \User $user
 */
	class Authentication {}
}

namespace {
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
	class Collection {}
}

namespace {
/**
 * An Eloquent Model: 'CollectionPlaylistAsset'
 *
 * @property integer $id
 * @property integer $collection_id
 * @property integer $playlist_id
 * @property integer $asset_id
 */
	class CollectionPlaylistAsset {}
}

namespace {
/**
 * An Eloquent Model: 'Comment'
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $post_id
 * @property integer $user_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Post $post
 */
	class Comment {}
}

namespace {
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
	class Group {}
}

namespace {
/**
 * An Eloquent Model: 'Playlist'
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Asset[] $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Collections[] $collections
 */
	class Playlist {}
}

namespace {
/**
 * An Eloquent Model: 'Post'
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\Comment[] $comments
 */
	class Post {}
}

namespace {
/**
 * An Eloquent Model: 'User'
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $permissions
 * @property boolean $activated
 * @property string $activation_code
 * @property \Carbon\Carbon $activated_at
 * @property \Carbon\Carbon $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property string $first_name
 * @property string $last_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $username
 * @property \Carbon\Carbon $deleted_at
 * @property string $website
 * @property string $country
 * @property string $gravatar
 * @property-read \Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\Asset[] $assets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Collection[] $collections
 * @property-read \Illuminate\Database\Eloquent\Collection|\Cartalyst\Sentry\Groups\Eloquent\Group[] $groups
 */
	class User {}
}

