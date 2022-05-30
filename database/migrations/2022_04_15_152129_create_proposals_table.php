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
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned();
            $table->integer('client_adderss_id')->unsigned();
            $table->string('status');
            $table->timestamp('proposal_date');
            $table->integer('proposal_amount');
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
        Schema::dropIfExists('proposals');
    }
};
