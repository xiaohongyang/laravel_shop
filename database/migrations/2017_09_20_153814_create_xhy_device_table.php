<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXhyDeviceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xhy_device', function(Blueprint $table)
		{
			$table->integer('user_id')->unique('device_user_id_unique');
			$table->string('device_id', 200)->index('device_device_id_index')->comment('设备id');
			$table->string('device_type', 200)->index('device_device_type_index')->comment('设备类型');
			$table->string('platform_type', 200)->index('device_platform_type_index')->comment('平台类型');
			$table->boolean('status')->default(1)->index('device_status_index')->comment('推送开关 0:关闭 1:开启 默认开启');
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
		Schema::drop('xhy_device');
	}

}
