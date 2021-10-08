<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personal_access_tokens', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('tokenable_type');
			$table->bigInteger('tokenable_id')->unsigned();
			$table->string('name');
			$table->string('token', 64)->unique();
			$table->text('abilities')->nullable();
			$table->dateTime('last_used_at')->nullable();
			$table->timestamps(10);
			$table->index(['tokenable_type','tokenable_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('personal_access_tokens');
	}

}
