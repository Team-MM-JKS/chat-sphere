<?php

use App\Enums\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Table::MESSAGE, function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('message_body');
			$table->unsignedBigInteger('creator_id');
			$table->foreign('creator_id')->references('id')->on(Table::USER)->onDelete('cascade');
			$table->unsignedBigInteger('parent_message_id');
			$table->foreign('parent_message_id')->references('id')->on(Table::MESSAGE)->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists(Table::MESSAGE);
	}
}
