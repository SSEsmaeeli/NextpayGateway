<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Ssesmaeeli\NextpayGateway\NextPay\ConstGateway;

class CreateNextpaygatewayTransactionsTable extends Migration
{
	function getTable()
	{
		return config('gateway.table', 'nextpay_gateway_transactions');
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->getTable(), function (Blueprint $table) {
			$table->engine = "innoDB";
			$table->unsignedBigInteger('id', true);
			$table->enum('gateway', [
                ConstGateway::NEXTPAY,
			]);
            $table->integer('status')->default(ConstGateway::TRANSACTION_PENDING);
            $table->integer('state')->default(ConstGateway::TRANSACTION_PENDING);
			$table->decimal('price', 15, 2);
			$table->string('trans_id', 50)->nullable();
			$table->string('card_number', 50)->nullable();
			$table->string('ip', 20)->nullable();
			$table->timestamp('payment_date')->nullable();
            $table->unsignedBigInteger('id_commodity');
			$table->nullableTimestamps();
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
		Schema::drop($this->getTable());
	}
}
