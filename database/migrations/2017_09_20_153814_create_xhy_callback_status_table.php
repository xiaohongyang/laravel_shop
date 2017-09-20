<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyCallbackStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_callback_status', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('msg_id', 50)->nullable()->default('');
			$table->string('type', 100)->nullable();
			$table->enum('status', array('true','false','running'))->nullable()->default('false')->index('ind_status');
			$table->string('type_id', 50)->nullable();
			$table->integer('date_time')->nullable()->index('date_time');
			$table->text('data', 65535)->nullable();
			$table->enum('disabled', array('true','false'))->nullable()->default('false');
			$table->boolean('times')->nullable()->default(0);
			$table->string('method', 100);
			$table->string('http_type', 20);
			$table->unique(['type','type_id'], 'ind_type_type_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_callback_status');
	}

}
