<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyGoodsArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_goods_article', function(Blueprint $table)
		{
			$table->integer('goods_id')->unsigned()->default(0);
			$table->integer('article_id')->unsigned()->default(0);
			$table->boolean('admin_id')->default(0);
			$table->primary(['goods_id','article_id','admin_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_goods_article');
	}

}
