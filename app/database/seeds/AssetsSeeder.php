<?php

class AssetsSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('assets')->truncate();

		$assetsseeder = array(
			array(
				"alpha_id" => "",
				"title" => "Video 1",
				"description" => "Desc 1",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			array(
				"alpha_id" => "",
				"title" => "Video 2",
				"description" => "Desc 2",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			array(
				"alpha_id" => "",
				"title" => "Video 3",
				"description" => "Desc 3",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			array(
				"alpha_id" => "",
				"title" => "Video 4",
				"description" => "Desc 4",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			array(
				"alpha_id" => "",
				"title" => "Video 5",
				"description" => "Desc 5",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			array(
				"alpha_id" => "",
				"title" => "Video 6",
				"description" => "Desc 6",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			array(
				"alpha_id" => "",
				"title" => "Video 7",
				"description" => "Desc 7",
				"filepath" => "",
				"filename" => "",
				"transcoded_url" => "",
				"thumbnail_url" => "",
				"url" => "",
				"type" => "",
				"status" => "",
				"tags" => "",
				"views" => ""
				),
			);

		// Uncomment the below to run the seeder
		DB::table('media_assets')->insert($assetsseeder);
	}

}
