<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyFriendLinkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_friend_link', function(Blueprint $table)
		{
			$table->smallInteger('link_id', true)->unsigned();
			$table->string('link_name')->default('');
			$table->string('link_url')->default('');
			$table->string('link_logo')->default('');
			$table->boolean('show_order')->default(50)->index('show_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_friend_link');
	}

}
