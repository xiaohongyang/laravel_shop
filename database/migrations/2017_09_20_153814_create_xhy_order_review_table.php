<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyOrderReviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_order_review', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('order_id');
			$table->integer('goods_id');
			$table->unique(['user_id','order_id','goods_id'], 'order_review_user_id_order_id_goods_id_unique');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_order_review');
	}

}
