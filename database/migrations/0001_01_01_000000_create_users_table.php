<?php

use App\Enums\PeopleType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar_path')->default('https://placehold.co/100x100?text=User');
            $table->enum('locale', ['hu', 'en'])->default('en');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['email', 'locale']);
        });

        Schema::create('people', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('slug')->unique();
            $table->string('bio_short');
            $table->text('bio');
            $table->date('birth_date');
            /* $table->enum('type', array_map(fn ($e) => $e->value, PeopleType::cases()))->default(PeopleType::OTHER); */
            $table->string('type', 50)->default(PeopleType::OTHER->value);

            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        User::create([
            'name' => "Test User",
            'email' => "email@example.com",
            'password' => Hash::make('Test123'),
            'avatar_path' => "https://placeholder.co/50x50"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
    }
};
