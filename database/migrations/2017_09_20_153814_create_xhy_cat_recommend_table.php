<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyCatRecommendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_cat_recommend', function(Blueprint $table)
		{
			$table->smallInteger('cat_id');
			$table->boolean('recommend_type');
			$table->primary(['cat_id','recommend_type']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_cat_recommend');
	}

}
