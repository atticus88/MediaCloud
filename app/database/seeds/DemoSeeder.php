<?php

class DemoSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('assets')->truncate();

/*****************************************/
		//ADDING DEMO - FACULTY
		$userData = array(
			'first_name' => 'Math1',
			'last_name' => 'Teacher',
			'username' => 'math1',
			'email'      => 'math1@demo.com',
			'password'   => 'math1'
			);

		$data = array_merge($userData, array(
			'activated'   => 1
			));
		// Create the user
		$user = Sentry::getUserProvider()->create($data);
		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(2);
		$user->addGroup($group);
/*****************************************/
		//ADDING DEMO - FACULTY
		$userData = array(
			'first_name' => 'Math2',
			'last_name' => 'Teacher',
			'username' => 'math2',
			'email'      => 'math2@demo.com',
			'password'   => 'math2'
			);

		$data = array_merge($userData, array(
			'activated'   => 1
			));
		// Create the user
		$user = Sentry::getUserProvider()->create($data);
		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(2);
		$user->addGroup($group);
/*****************************************/
		//ADDING DEMO - FACULTY
		$userData = array(
			'first_name' => 'Health',
			'last_name' => 'Teacher',
			'username' => 'health',
			'email'      => 'health@demo.com',
			'password'   => 'health'
			);

		$data = array_merge($userData, array(
			'activated'   => 1
			));
		// Create the user
		$user = Sentry::getUserProvider()->create($data);
		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(2);
		$user->addGroup($group);
/*****************************************/
		//ADDING DEMO - FACULTY
		$userData = array(
			'first_name' => 'Science',
			'last_name' => 'Teacher',
			'username' => 'science',
			'email'      => 'science@demo.com',
			'password'   => 'science'
			);

		$data = array_merge($userData, array(
			'activated'   => 1
			));
		// Create the user
		$user = Sentry::getUserProvider()->create($data);
		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(2);
		$user->addGroup($group);
/*****************************************/
		//ADDING DEMO USER 1 - STUDENT
		$userData = array(
			'first_name' => 'demo Student',
			'last_name' => 'demo Student',
			'username' => 'demo',
			'email'      => 'student@demo.com',
			'password'   => 'demo'
			);

		$data = array_merge($userData, array(
			'activated'   => 1,
		));

		// Create the user
		$user = Sentry::getUserProvider()->create($data);
		// Associate the Admin group to this user
		$group = Sentry::getGroupProvider()->findById(3); //add student group
		$user->addGroup($group);
/*****************************************/

		// ADDING ASSETS
		$assetsseeder = array(
			array("title" => "Video 1", "description" => "Desc 1 - fraction", ),
			array("title" => "Video 2", "description" => "Desc 2 - trig", ),
			array("title" => "Video 3", "description" => "Desc 3 - addition", ),
			array("title" => "Video 4", "description" => "Desc 4 - calc", ),
			array("title" => "Video 5", "description" => "Desc 5 - cells", ),
			array("title" => "Video 6", "description" => "Desc 6 - eyes", ),
			array("title" => "Video 7", "description" => "Desc 7 - toes", ),
			array("title" => "Video 8", "description" => "Desc 8 - physics", ),
			array("title" => "Video 9", "description" => "Desc 9 - rocks", ),
			array("title" => "Video 10", "description" => "Desc 10 - ", ),
			array("title" => "Video 11", "description" => "Desc 11 - ", ),
			array("title" => "Video 12", "description" => "Desc 12 - ", ),
			array("title" => "Video 13", "description" => "Desc 13 - ", ),
			array("title" => "Video 14", "description" => "Desc 14 - ", ),
			array("title" => "Video 15", "description" => "Desc 15 - ", ),
			array("title" => "Video 16", "description" => "Desc 16 - ", ),
			array("title" => "Video 17", "description" => "Desc 17 - ", ),
			array("title" => "Video 18", "description" => "Desc 18 - ", ),
			array("title" => "Video 19", "description" => "Desc 19 - ", ),
			array("title" => "Video 20", "description" => "Desc 20 - ", ),
			);
		DB::table('assets')->insert($assetsseeder);

		$user = User::find(2);
		$user->assets()->attach(1);
		$user->assets()->attach(2);
		$user->assets()->attach(10);
		$user = User::find(3);
		$user->assets()->attach(3);
		$user->assets()->attach(4);
		$user = User::find(4);
		$user->assets()->attach(5);
		$user->assets()->attach(6);
		$user->assets()->attach(7);
		$user = User::find(5);
		$user->assets()->attach(8);
		$user->assets()->attach(9);
		$user = User::find(1);
		$user->assets()->attach(11);
		$user->assets()->attach(12);
		$user->assets()->attach(13);
		$user->assets()->attach(14);
		$user->assets()->attach(15);
		$user->assets()->attach(16);
		$user->assets()->attach(17);
		$user->assets()->attach(18);
		$user->assets()->attach(19);
		$user->assets()->attach(20);


//******************************************************

		// Adding Collection - Department
		$collection = new Collection;
		$collection->name = 'Collection - Math Department';
		$collection->save();
		$collection->assets()->attach(10);



		// Adding Playlists
		$playlist = new Playlist;
		$playlist->name = 'Playlist - Math Department 1';
		$playlist->save();

		$collection->playlists()->attach($playlist->id);
		$playlist->assets()->attach(1);

		$playlist = new Playlist;
		$playlist->name = 'Playlist - Math Department 2';
		$playlist->save();

		$collection->playlists()->attach($playlist->id);
		$playlist->assets()->attach(2);
		$playlist->assets()->attach(3);
		$playlist->assets()->attach(4);

//******************************************************


		// Adding Collection - Department
		$collection = new Collection;
		$collection->name = 'Collection - Health Department';
		$collection->save();

		// Adding Playlists
		$playlist = new Playlist;
		$playlist->name = 'Playlist - Health Department 1';
		$playlist->save();
		$collection->playlists()->attach($playlist->id);
		$playlist->assets()->attach(5);

		$playlist = new Playlist;
		$playlist->name = 'Playlist - Health Department 2';
		$playlist->save();
		$collection->playlists()->attach($playlist->id);
		$playlist->assets()->attach(6);
		$playlist->assets()->attach(7);

//******************************************************

		// Adding Collection - Department
		$collection = new Collection;
		$collection->name = 'Collection - Science Department';
		$collection->save();


		// Adding Playlists
		$playlist = new Playlist;
		$playlist->name = 'Playlist - Science Department 1';
		$playlist->save();
		$collection->playlists()->attach($playlist->id);
		$playlist->assets()->attach(8);

		$playlist = new Playlist;
		$playlist->name = 'Playlist - Science Department 2';
		$playlist->save();
		$collection->playlists()->attach($playlist->id);
		$playlist->assets()->attach(9);
//******************************************************

		// //asset to user
		// $asset = Asset::find(1);
		// $asset->collection->attach(1);

		// Uncomment the below to run the seeder
		// DB::table('user')->insert($userSeeder);
	}

}
