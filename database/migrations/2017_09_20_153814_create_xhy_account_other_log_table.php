<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyAccountOtherLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_account_other_log', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('order_id');
			$table->string('order_sn', 20);
			$table->decimal('money', 10)->default(0.00);
			$table->string('pay_type', 20);
			$table->string('pay_time', 10);
			$table->string('change_desc');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_account_other_log');
	}

}
