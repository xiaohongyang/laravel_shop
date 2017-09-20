<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyUserRankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_user_rank', function(Blueprint $table)
		{
			$table->boolean('rank_id')->primary();
			$table->string('rank_name', 30)->default('');
			$table->integer('min_points')->unsigned()->default(0);
			$table->integer('max_points')->unsigned()->default(0);
			$table->boolean('discount')->default(0);
			$table->boolean('show_price')->default(1);
			$table->boolean('special_rank')->default(0);
			$table->integer('year_points')->nullable()->default(0)->comment('兑换一年的需要的积分，针对特殊会员组等级');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_user_rank');
	}

}
