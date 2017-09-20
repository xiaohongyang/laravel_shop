<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyEmailSendlistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_email_sendlist', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('email', 100);
			$table->integer('template_id');
			$table->text('email_content', 65535);
			$table->boolean('error')->default(0);
			$table->boolean('pri');
			$table->integer('last_send');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_email_sendlist');
	}

}
