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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->string('type');
            $table->integer('record_id');
            $table->string('name');
            $table->string('mime_type')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
