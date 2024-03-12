<?php

use App\Enums\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageRecipientsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Table::MESSAGE_RECIPIENT, function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('recipient_id');
			$table->foreign('recipient_id')->references('id')->on(Table::USER)->onDelete('cascade');
			$table->unsignedBigInteger('recipient_group_id');
			$table->foreign('recipient_group_id')->references('id')->on(Table::USER_GROUP)->onDelete('cascade');
			$table->unsignedBigInteger('message_id');
			$table->foreign('message_id')->references('id')->on(Table::MESSAGE)->onDelete('cascade');
			$table->unsignedTinyInteger('is_read')->default(0);
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
		Schema::dropIfExists(Table::MESSAGE_RECIPIENT);
	}
}
