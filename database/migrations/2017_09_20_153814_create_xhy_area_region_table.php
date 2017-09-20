<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyAreaRegionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_area_region', function(Blueprint $table)
		{
			$table->smallInteger('shipping_area_id')->unsigned()->default(0);
			$table->smallInteger('region_id')->unsigned()->default(0);
			$table->primary(['shipping_area_id','region_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_area_region');
	}

}
