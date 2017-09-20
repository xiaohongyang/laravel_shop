<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyShopBindTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_shop_bind', function(Blueprint $table)
		{
			$table->increments('shop_id');
			$table->string('name')->nullable()->comment('名称');
			$table->string('node_id', 32)->nullable()->comment('节点');
			$table->string('node_type', 128)->nullable()->comment('节点类型');
			$table->enum('status', array('bind','unbind'))->nullable()->comment('状态');
			$table->string('app_url', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_shop_bind');
	}

}
