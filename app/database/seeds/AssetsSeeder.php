<?php

class AssetsSeeder extends Seeder {

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

		// Uncomment the below to run the seeder
		DB::table('assets')->insert($assetsseeder);
	}

}
