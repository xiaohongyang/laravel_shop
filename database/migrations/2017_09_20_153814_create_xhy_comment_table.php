<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyCommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_comment', function(Blueprint $table)
		{
			$table->increments('comment_id');
			$table->boolean('comment_type')->default(0);
			$table->integer('id_value')->unsigned()->default(0)->index('id_value');
			$table->string('email', 60)->default('');
			$table->string('user_name', 60)->default('');
			$table->text('content', 65535);
			$table->boolean('comment_rank')->default(0);
			$table->integer('add_time')->unsigned()->default(0);
			$table->string('ip_address', 15)->default('');
			$table->boolean('status')->default(0);
			$table->integer('parent_id')->unsigned()->default(0)->index('parent_id');
			$table->integer('user_id')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_comment');
	}

}
