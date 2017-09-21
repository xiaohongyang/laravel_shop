<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyShopConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_shop_config', function(Blueprint $table)
		{
			$table->smallInteger('id', true)->unsigned();
			$table->smallInteger('parent_id')->unsigned()->default(0)->index('parent_id');
			$table->string('code', 30)->default('')->unique('code');
			$table->string('type', 10)->default('');
			$table->string('store_range')->default('');
			$table->string('store_dir')->default('');
			$table->text('value', 65535);
			$table->boolean('sort_order')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_shop_config');
	}

}
