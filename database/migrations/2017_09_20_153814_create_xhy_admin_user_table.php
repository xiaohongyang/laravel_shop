<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyAdminUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_admin_user', function(Blueprint $table)
		{
			$table->smallInteger('user_id', true)->unsigned();
			$table->string('user_name', 60)->default('')->index('user_name');
			$table->string('email', 60)->default('');
			$table->string('password', 32)->default('');
			$table->string('ec_salt', 10)->nullable();
			$table->integer('add_time')->default(0);
			$table->integer('last_login')->default(0);
			$table->string('last_ip', 15)->default('');
			$table->text('action_list', 65535);
			$table->text('nav_list', 65535);
			$table->string('lang_type', 50)->default('');
			$table->smallInteger('agency_id')->unsigned()->index('agency_id');
			$table->smallInteger('suppliers_id')->unsigned()->nullable()->default(0);
			$table->text('todolist')->nullable();
			$table->smallInteger('role_id')->nullable();
			$table->string('passport_uid', 20)->nullable();
			$table->smallInteger('yq_create_time')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_admin_user');
	}

}
