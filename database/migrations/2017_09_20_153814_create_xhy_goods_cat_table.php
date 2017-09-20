<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyGoodsCatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_goods_cat', function(Blueprint $table)
		{
			$table->integer('goods_id')->unsigned()->default(0);
			$table->smallInteger('cat_id')->unsigned()->default(0);
			$table->primary(['goods_id','cat_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_goods_cat');
	}

}
