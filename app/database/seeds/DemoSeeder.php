<?php

class DemoSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('assets')->truncate();

		$assetsseeder = array(
			array(
				"title" => "Video 1",
				"description" => "Desc 1",
				),
			array(
				"title" => "Video 2",
				"description" => "Desc 2",
				),
			array(
				"title" => "Video 3",
				"description" => "Desc 3",
				),
			array(
				"title" => "Video 4",
				"description" => "Desc 4",
				),
			array(
				"title" => "Video 5",
				"description" => "Desc 5",
				),
			array(
				"title" => "Video 6",
				"description" => "Desc 6",
				),
			array(
				"title" => "Video 7",
				"description" => "Desc 7",
				),
			);
		DB::table('assets')->insert($assetsseeder);

		$userData = array(
			'first_name' => 'demo1',
			'last_name' => 'demo1',
			'username' => 'demo',
			'email'      => 'demo@demo.com',
			'password'   => 'demo'
			);

		$data = array_merge($userData, array(
			'activated'   => 1,
			'permissions' => array(
				'admin' => 1,
				'user'  => 1,
				),

			));

		// Create the user
		$user = Sentry::getUserProvider()->create($data);

		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(3);
		$user->addGroup($group);


		$collection = new Collection;
		$collection->name = 'Collection - Math Department';
		$collection->save();

		$collection = new Collection;
		$collection->name = 'Collection - Health Department';
		$collection->save();

		$collection = new Collection;
		$collection->name = 'Collection - Science Department';
		$collection->save();


		$playlist = new Playlist;
		$playlist->name = 'Playlist - Science Department 1';
		$playlist->save();

		$playlist = new Playlist;
		$playlist->name = 'Playlist - Science Department 2';
		$playlist->save();

		$collection->playlists()->attach(1);
		$collection->playlists()->attach(2);
		// $collection->playlists->attach(2);

		// //asset to user
		// $asset = Asset::find(1);
		// $asset->collection->attach(1);

		// Uncomment the below to run the seeder
		// DB::table('user')->insert($userSeeder);
	}

}
