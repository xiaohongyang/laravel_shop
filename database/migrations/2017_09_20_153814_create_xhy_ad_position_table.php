<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyAdPositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_ad_position', function(Blueprint $table)
		{
			$table->boolean('position_id')->primary();
			$table->string('position_name', 60)->default('');
			$table->string('ad_width', 10)->default('100%');
			$table->string('ad_height', 10)->default('100%');
			$table->string('position_desc')->default('');
			$table->text('position_style', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_ad_position');
	}

}
