<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyEmailListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_email_list', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email', 60);
			$table->boolean('stat')->default(0);
			$table->string('hash', 10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_email_list');
	}

}
