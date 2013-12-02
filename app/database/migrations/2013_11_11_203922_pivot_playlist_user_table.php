<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotPlaylistUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('playlist_user', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('playlist_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('playlist_user');
	}

}
