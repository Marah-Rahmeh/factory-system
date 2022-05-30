<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proposal_id')->unsigned();
            $table->integer('price_amount');
            $table->string('status');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->integer('cr_id')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('up_id')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
