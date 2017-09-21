<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyPushTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_push', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->default(0)->index('push_user_id_index');
			$table->string('title', 200)->index('push_title_index')->comment('标题');
			$table->string('content', 200)->index('push_content_index')->comment('内容');
			$table->string('photo', 200)->nullable()->index('push_photo_index')->comment('图片');
			$table->string('objectId', 200)->nullable()->index('push_objectid_index')->comment('leancloud返回的objectId');
			$table->string('link', 200)->nullable()->index('push_link_index')->comment('链接');
			$table->boolean('platform')->default(3)->comment('平台类型');
			$table->boolean('push_type')->nullable()->default(0)->comment('任务类型 1 定时任务 0 即时推送');
			$table->boolean('message_type')->nullable()->default(1)->comment('消息类型 1　系统消息 ２ 物流消息');
			$table->boolean('isPush')->nullable()->default(0)->comment('定时任务是否已经推送');
			$table->dateTime('push_at')->nullable()->comment('定时推送时间');
			$table->boolean('status')->default(1)->index('push_status_index')->comment('状态 0:关闭 1:开启 默认开启');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xhy_push');
	}

}
