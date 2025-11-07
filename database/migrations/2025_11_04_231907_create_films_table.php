<?php

use App\Enums\{CutCodes, FilmLanguages, MasterTypes, FilmStatus};
use App\Models\Film;
use App\Models\FilmVersion;
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

            /* $table->enum('status', array_map(fn ($e) => $e->value, FilmStatus::cases())); */
            $table->string('status', 50)->default(FilmStatus::PLANNING->value);
            $table->unsignedSmallInteger('duration_minutes')->nullable();
            $table->decimal('average_rating', 3, 1)->default(0.0);

            $table->string('poster_path', 2048)->nullable();
            $table->string('cover_path', 2048); /* The cover is a must-have */

            /* $table->enum('primary_language', ['hu', 'en'])->default('hu'); */
            $table->string('primary_language', 2)->default(FilmLanguages::HUNGARIAN->value);

            $table->index(['title', 'year', 'status']);
            $table->index(['title', 'status']);
            $table->index('title');
            $table->index('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('film_translations', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Film::class)->constrained()->cascadeOnDelete();

            /* $table->enum('locale', array_map(fn($e) => $e->value, FilmLanguages::cases()))->default(FilmLanguages::HUNGARIAN); */
            $table->string('locale', 2)->default(FilmLanguages::HUNGARIAN->value); // 'hu', 'en', etc
            $table->string('title', 180);

            $table->string('logline', 280)->nullable();
            $table->mediumText('synopsis_md')->nullable();
            $table->mediumText('director_note_md')->nullable();

            $table->unique(['film_id', 'locale']);
            $table->index('title');
            $table->timestamps();
        });

        Schema::create('film_versions', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Film::class)->constrained()->cascadeOnDelete();

            $table->string('name', 60);
            $table->unsignedSmallInteger('duration_minutes');
            $table->boolean('is_primary')->default(false);
            /* $table->enum('master_type', array_map(fn($e) => $e->value, MasterTypes::cases()));
            $table->enum('cut_code', array_map(fn($e) => $e->value, CutCodes::cases()))->default(CutCodes::OTHER); */
            $table->string('master_type', 50);
            $table->string('cut_code', 50)->default(CutCodes::OTHER->value);

            $table->string('vimeo_private_link', 2048)->nullable();
            $table->string('vimeo_password', 100)->nullable();

            $table->unique(['film_id', 'name']);
            $table->index('film_id');
            $table->timestamps();
        });

        Schema::table('films', function (Blueprint $table) {
            $table->foreignIdFor(FilmVersion::class, 'primary_version_id')
                ->nullable()
                ->after('cover_path')
                ->constrained()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dropConstrainedForeignId('primary_version_id');
        });

        Schema::dropIfExists('film_translations');
        Schema::dropIfExists('film_versions');
        Schema::dropIfExists('films');
    }
};
