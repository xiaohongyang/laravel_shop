<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyGoodsAttrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_goods_attr', function(Blueprint $table)
		{
			$table->increments('goods_attr_id');
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->smallInteger('attr_id')->unsigned()->default(0)->index('attr_id');
			$table->text('attr_value', 65535);
			$table->string('attr_price')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_goods_attr');
	}

}
