<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhySnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_sns', function(Blueprint $table)
		{
			$table->integer('user_id')->unique('sns_user_id_unique');
			$table->string('open_id')->index('sns_open_id_index');
			$table->boolean('vendor')->index('sns_vendor_index')->comment('第三方平台类型');
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
		Schema::drop('xhy_sns');
	}

}
