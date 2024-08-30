<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_complains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaction_id');
            $table->string('note')->nullable();
            $table->string('note_admin')->nullable();
            $table->enum('status', ['false', 'true'])->comment('false or true for return payment status')->default('false');
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
        Schema::dropIfExists('order_complains');
    }
}
