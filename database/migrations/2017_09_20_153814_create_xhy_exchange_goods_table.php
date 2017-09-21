<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyExchangeGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_exchange_goods', function(Blueprint $table)
		{
			$table->integer('goods_id')->unsigned()->default(0)->primary();
			$table->integer('exchange_integral')->unsigned()->default(0);
			$table->boolean('is_exchange')->default(0);
			$table->boolean('is_hot')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_exchange_goods');
	}

}
