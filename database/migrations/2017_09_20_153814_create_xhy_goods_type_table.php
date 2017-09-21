<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyGoodsTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_goods_type', function(Blueprint $table)
		{
			$table->smallInteger('cat_id', true)->unsigned();
			$table->string('cat_name', 60)->default('');
			$table->boolean('enabled')->default(1);
			$table->string('attr_group');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_goods_type');
	}

}
