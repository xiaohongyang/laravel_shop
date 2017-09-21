<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyPayLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_pay_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('order_id')->unsigned()->default(0);
			$table->decimal('order_amount', 10)->unsigned();
			$table->boolean('order_type')->default(0);
			$table->boolean('is_paid')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_pay_log');
	}

}
