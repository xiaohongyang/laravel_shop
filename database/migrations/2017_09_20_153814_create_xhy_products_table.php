<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_products', function(Blueprint $table)
		{
			$table->increments('product_id');
			$table->integer('goods_id')->unsigned()->default(0);
			$table->string('goods_attr', 50)->nullable();
			$table->string('product_sn', 60)->nullable();
			$table->integer('product_number')->unsigned()->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_products');
	}

}
