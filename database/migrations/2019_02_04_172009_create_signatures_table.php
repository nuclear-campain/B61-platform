<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSignaturesTable
 */
class CreateSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // (1) Nullable because the Signature observer need
        //     to fill in the relation after the create proces

        Schema::create('signatures', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('postal')->nullable(); // (1)
            $table->string('firstname', 30);
            $table->string('lastname', 80);
            $table->string('email', 191);
            $table->string('city', 90);
            $table->string('country', 30);
            $table->timestamps();

            // Foreign keys
            $table->foreign('postal')->references('id')->on('postals')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('signatures');
    }
}
