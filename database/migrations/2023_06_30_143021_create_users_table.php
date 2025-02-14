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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->bigIncrements('id');

                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('name')->nullable();
                $table->string('image')->nullable();
                $table->string('email')->nullable();
                $table->string('mobile')->nullable();

                $table->string('fathers_name')->nullable();
                $table->string('mothers_name')->nullable();
                $table->string('date_of_birth')->nullable();
                $table->string('nid')->nullable();
                $table->string('gender')->nullable();
                $table->string('blood_group')->nullable();
                $table->string('education_qualification')->nullable();
                $table->string('profession')->nullable();
                $table->string('other_expertise')->nullable();

                $table->string('country')->nullable();
                $table->string('division')->nullable();
                $table->string('district')->nullable();
                $table->string('upazila')->nullable();
                $table->string('union')->nullable();
                $table->string('address')->nullable();
                $table->string('membership_type')->nullable();
                $table->bigInteger('member_id')->nullable();
                $table->integer('payment_id')->nullable();

                $table->string('username')->unique();
                $table->string('password');
                $table->string('usertype');
                $table->string('role');
                $table->integer('role_id');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('code')->nullable();
                $table->tinyInteger('status')->default(1);

                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
