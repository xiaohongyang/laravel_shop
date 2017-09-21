<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyBackOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_back_order', function(Blueprint $table)
		{
			$table->increments('back_id');
			$table->string('delivery_sn', 20);
			$table->string('order_sn', 20);
			$table->integer('order_id')->unsigned()->default(0)->index('order_id');
			$table->string('invoice_no', 50)->nullable();
			$table->integer('add_time')->unsigned()->nullable()->default(0);
			$table->boolean('shipping_id')->nullable()->default(0);
			$table->string('shipping_name', 120)->nullable();
			$table->integer('user_id')->unsigned()->nullable()->default(0)->index('user_id');
			$table->string('action_user', 30)->nullable();
			$table->string('consignee', 60)->nullable();
			$table->string('address', 250)->nullable();
			$table->smallInteger('country')->unsigned()->nullable()->default(0);
			$table->smallInteger('province')->unsigned()->nullable()->default(0);
			$table->smallInteger('city')->unsigned()->nullable()->default(0);
			$table->smallInteger('district')->unsigned()->nullable()->default(0);
			$table->string('sign_building', 120)->nullable();
			$table->string('email', 60)->nullable();
			$table->string('zipcode', 60)->nullable();
			$table->string('tel', 60)->nullable();
			$table->string('mobile', 60)->nullable();
			$table->string('best_time', 120)->nullable();
			$table->string('postscript')->nullable();
			$table->string('how_oos', 120)->nullable();
			$table->decimal('insure_fee', 10)->unsigned()->nullable()->default(0.00);
			$table->decimal('shipping_fee', 10)->unsigned()->nullable()->default(0.00);
			$table->integer('update_time')->unsigned()->nullable()->default(0);
			$table->smallInteger('suppliers_id')->nullable()->default(0);
			$table->boolean('status')->default(0);
			$table->integer('return_time')->unsigned()->nullable()->default(0);
			$table->smallInteger('agency_id')->unsigned()->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_back_order');
	}

}
