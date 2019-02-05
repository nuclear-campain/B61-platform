<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateArticlesTable
 */
class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('author_id')->nullable();
            $table->boolean('is_draft')->default('1');
            $table->string('title');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('author_id')->references('id')->on('users')->ondelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
}
