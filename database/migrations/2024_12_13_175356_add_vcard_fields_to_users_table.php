<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_logo')->nullable()->after('mobile');
            $table->string('mobile2')->nullable()->after('company_logo');
            $table->string('facebook_link')->nullable()->after('mobile2');
            $table->string('twitter_link')->nullable()->after('facebook_link');
            $table->string('whatsapp_link')->nullable()->after('twitter_link');
            $table->string('linkedin_link')->nullable()->after('whatsapp_link');
            $table->string('instagram_link')->nullable()->after('linkedin_link');
            $table->string('youtube_link')->nullable()->after('instagram_link');
            $table->string('messenger_link')->nullable()->after('youtube_link');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_logo');
            $table->dropColumn('mobile2');
            $table->dropColumn('facebook_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('whatsapp_link');
            $table->dropColumn('linkedin_link');
            $table->dropColumn('instagram_link');
            $table->dropColumn('youtube_link');
            $table->dropColumn('messenger_link');
        });
    }
};
