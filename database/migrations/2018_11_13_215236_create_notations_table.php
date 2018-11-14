<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('city_id')->nullable();
            $table->timestamps();

            // Foreign keys 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notations');
    }
}
