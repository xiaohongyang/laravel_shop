<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyRegExtendInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_reg_extend_info', function(Blueprint $table)
		{
			$table->increments('Id');
			$table->integer('user_id')->unsigned();
			$table->integer('reg_field_id')->unsigned();
			$table->text('content', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_reg_extend_info');
	}

}
