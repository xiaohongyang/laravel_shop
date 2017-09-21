<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyAdminActionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_admin_action', function(Blueprint $table)
		{
			$table->boolean('action_id')->primary();
			$table->boolean('parent_id')->default(0)->index('parent_id');
			$table->string('action_code', 20)->default('');
			$table->string('relevance', 20)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_admin_action');
	}

}
