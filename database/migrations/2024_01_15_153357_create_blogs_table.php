<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Unique slug for SEO-friendly URLs
            $table->string('short_description')->nullable();
            $table->text('content');
            $table->string('author')->nullable(); // Foreign key for the author
            $table->string('image')->nullable(); // Path to the blog's image, nullable if no image
            $table->string('tags')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('blogs');
    }
}
