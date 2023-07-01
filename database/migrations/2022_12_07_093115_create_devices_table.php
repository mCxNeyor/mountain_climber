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
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cust_id');
            $table->string('dev_id');
            $table->string('lat');
            $table->string('long');
            $table->string('bpm')->nullable();
            $table->string('body')->nullable();
            $table->string('temp')->nullable();
            $table->string('hum')->nullable();
            $table->string('att')->nullable();
            $table->string('speed')->nullable();
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('cascade')
                ->onUpdate('cascade');;
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
        Schema::dropIfExists('devices');
    }
};
