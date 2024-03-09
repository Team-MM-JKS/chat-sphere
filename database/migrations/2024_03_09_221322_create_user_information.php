<?php

use App\Enums\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInformation extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Table::USER_INFORMATION, function (Blueprint $table)
		{
			$table->id();
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on(Table::USER)->onDelete('cascade');

			$table->string('bio')->nullable();
			$table->string('nickname', 100)->nullable();
			$table->string('profile_image')->nullable();
			$table->string('background_image')->nullable();
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
		Schema::dropIfExists(Table::USER_INFORMATION);
	}
}
