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
		Schema::create('assets', function(Blueprint $table) {
			$table->increments('id');
			$table->string('alpha_id');
			$table->string('title');
			$table->string('description');
			$table->string('filepath_original');
			$table->string('filepath_transcoded');
			$table->string('url_original');
			$table->string('url_transcoded');
			$table->string('type');
			$table->string('status');
			$table->text('permissions');
			$table->string('tags');
			$table->integer('views');
			$table->integer('uploaded_by');
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
		Schema::drop('assets');
	}

}
