<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyBrandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_brand', function(Blueprint $table)
		{
			$table->smallInteger('brand_id', true)->unsigned();
			$table->string('brand_name', 60)->default('');
			$table->string('brand_logo', 80)->default('');
			$table->text('brand_desc', 65535);
			$table->string('site_url')->default('');
			$table->boolean('sort_order')->default(50);
			$table->boolean('is_show')->default(1)->index('is_show');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_brand');
	}

}
