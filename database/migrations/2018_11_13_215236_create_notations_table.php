<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateNotationTable
 */
class CreateNotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('notations', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('author_id')->nullable();
            $table->boolean('status');
            $table->string('title');
            $table->text('description');
            $table->timestamps();

            // Foreign keys
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('notations');
    }
}
