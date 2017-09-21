<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyShippingAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_shipping_area', function(Blueprint $table)
		{
			$table->smallInteger('shipping_area_id', true)->unsigned();
			$table->string('shipping_area_name', 150)->default('');
			$table->boolean('shipping_id')->default(0)->index('shipping_id');
			$table->text('configure', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_shipping_area');
	}

}
