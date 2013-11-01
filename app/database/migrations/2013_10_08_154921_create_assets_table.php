<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('media_assets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->string('filepath');
			$table->string('filename');
			$table->text('permissions');
			$table->string('transcoded_url');
			$table->string('thumbnail_url');
			$table->string('url');
			$table->string('type');
			$table->string('status');
			$table->string('tags');
			$table->integer('views');
			$table->datetime('last_viewed');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('media_assets');
	}

}
