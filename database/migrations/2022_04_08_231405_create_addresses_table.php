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
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->text('name');
            $table->text('province');
            $table->text('neighborhood');
            $table->text('pobox');
            $table->string('contact_name');
            $table->bigInteger('contact_personal_id')->nullable();
            $table->bigInteger('contact_mobile')->nullable();
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
        Schema::dropIfExists('addresses');
    }
};
