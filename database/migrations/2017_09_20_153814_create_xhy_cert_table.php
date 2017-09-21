<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyCertTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_cert', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('config_id')->index('cert_config_id_index')->comment('配置id');
			$table->binary('file', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_cert');
	}

}
