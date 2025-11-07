<?php

use App\Models\Film;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();

            $table->string('title', 180);
            $table->string('slug', 200)->unique();
            $table->unsignedSmallInteger('year');

            /* TODO: extract this to it's own Enum class */
            $table->enum('status', ['developing', 'production', 'post', 'released', 'festival']);
            $table->unsignedSmallInteger('duration_minutes')->nullable();
            $table->decimal('avarage_rating', 3, 1)->default(0.0);

            $table->string('poster_path', 2048)->nullable();
            $table->string('cover_path', 2048); /* The cover is a must-have */

            /* TODO: extract this to it's own Enum class */
            $table->enum('primary_language', ['hu', 'en'])->default('hu');

            $table->index(['title', 'year', 'status']);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('film_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Film::class)->constrained()->cascadeOnDelete();

            /* TODO: extract this to it's own Enum class */
            $table->enum('locale', ['hu', 'en'])->default('hu');
            $table->string('title', 180);

            $table->string('logline', 280)->nullable();
            $table->mediumText('synopsis_md')->nullable();
            $table->mediumText('director_note_md')->nullable();

            $table->unique(['film_id', 'locale']);
            $table->timestamps();
        });

        Schema::create('film_versions', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Film::class)->constrained()->cascadeOnDelete();

            $table->string('name', 60);
            $table->unsignedSmallInteger('duration_minutes');
            $table->boolean('is_primary')->default(false);
            $table->enum('master_type', ['prores', 'dcp', 'mp4']);
            $table->enum('cut_code', ['festival', 'director', 'tv', 'airline', 'web', 'other'])->default('other');

            $table->string('vimeo_private_link', 2048)->nullable();
            $table->string('vimeo_password', 100)->nullable();

            $table->unique(['film_id', 'name']);
            $table->index('film_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_translations');
        Schema::dropIfExists('film_versions');
        Schema::dropIfExists('films');
    }
};
