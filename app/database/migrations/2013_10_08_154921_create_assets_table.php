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
			$table->string('title');
			$table->string('description');
            $table->string('type');
            $table->string('filepath');
            $table->string('status');
            $table->text('permissions');
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
