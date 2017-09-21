<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyCartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_cart', function(Blueprint $table)
		{
			$table->increments('rec_id');
			$table->integer('user_id')->unsigned()->default(0);
			$table->char('session_id', 32)->default('')->index('session_id');
			$table->integer('goods_id')->unsigned()->default(0);
			$table->string('goods_sn', 60)->default('');
			$table->integer('product_id')->unsigned()->default(0);
			$table->string('goods_name', 120)->default('');
			$table->decimal('market_price', 10)->unsigned()->default(0.00);
			$table->decimal('goods_price', 10)->default(0.00);
			$table->smallInteger('goods_number')->unsigned()->default(0);
			$table->text('goods_attr', 65535);
			$table->boolean('is_real')->default(0);
			$table->string('extension_code', 30)->default('');
			$table->integer('parent_id')->unsigned()->default(0);
			$table->boolean('rec_type')->default(0);
			$table->smallInteger('is_gift')->unsigned()->default(0);
			$table->boolean('is_shipping')->default(0);
			$table->boolean('can_handsel')->default(0);
			$table->string('goods_attr_id')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_cart');
	}

}
