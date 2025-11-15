<?php

use App\Models\MailDomain;
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
        Schema::create('mail_domains', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // pl. silentwords.eu
            $table->timestamps();
        });

        Schema::create('mail_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MailDomain::class, 'domain_id')->constrained()->cascadeOnDelete();
            /* $table->foreignId('domain_id')->constrained('mail_domains')->cascadeOnDelete(); */
            $table->string('local_part'); // pl. "info"
            $table->string('email')->unique(); // pl. "info@silentwords.eu"
            $table->string('password'); // Dovecot hash
            $table->timestamps();

            $table->index(['domain_id', 'local_part']);
        });

        Schema::create('mail_aliases', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MailDomain::class, 'domain_id')->constrained()->cascadeOnDelete();
            /* $table->foreignId('domain_id')->constrained('mail_domains')->cascadeOnDelete(); */
            $table->string('source');      // pl. hello@silentwords.eu
            $table->string('destination'); // pl. info@silentwords.eu
            $table->timestamps();

            $table->index(['domain_id', 'source']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_aliases');
        Schema::dropIfExists('mail_users');
        Schema::dropIfExists('mail_domains');
    }
};
