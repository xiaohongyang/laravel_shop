<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyGoodsGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_goods_gallery', function(Blueprint $table)
		{
			$table->increments('img_id');
			$table->integer('goods_id')->unsigned()->default(0)->index('goods_id');
			$table->string('img_url')->default('');
			$table->string('img_desc')->default('');
			$table->string('thumb_url')->default('');
			$table->string('img_original')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_goods_gallery');
	}

}
