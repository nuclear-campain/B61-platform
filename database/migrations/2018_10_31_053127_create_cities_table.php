<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCitiesTable
 */
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('province_id')->index()->nullable();
            $table->unsignedInteger('postal_id')->nullable()->index();
            $table->string('name');
            $table->string('lat');
            $table->string('lng');

            // Foreign keys 
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('postal_id')->references('id')->on('postals')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
}
