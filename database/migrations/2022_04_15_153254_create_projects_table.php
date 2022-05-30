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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned();
            $table->string('name');
            $table->integer('manager_id')->unsigned();
            $table->date('plane_delivery_date')->format('d/m/Y')->nullable();
            $table->date('delivery_date')->format('d/m/Y')->nullable();
            $table->string('status');
            $table->date('start_date')->format('d/m/Y')->nullable();
            $table->date('end_date')->format('d/m/Y')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
