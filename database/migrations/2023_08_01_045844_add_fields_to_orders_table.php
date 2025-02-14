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
        if (!Schema::hasTable('orders')) {
            Schema::table('orders', function (Blueprint $table) {

                $table->string('first_name')->nullable()->after('currency');
                $table->string('last_name')->nullable()->after('currency');
                $table->string('image')->nullable()->after('currency');
                $table->string('date_of_birth')->nullable()->after('currency');

                $table->string('nid')->nullable()->after('currency');
                $table->string('gender')->nullable()->after('currency');
                $table->string('blood_group')->nullable()->after('currency');
                $table->string('education_qualification')->nullable()->after('currency');

                $table->string('profession')->nullable()->after('currency');
                $table->string('other_expertise')->nullable()->after('currency');
                $table->string('country')->nullable()->after('currency');

                $table->string('division')->nullable()->after('currency');
                $table->string('district')->nullable()->after('currency');

                $table->string('membership_type')->nullable()->after('currency');

            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('image');


            $table->dropColumn('date_of_birth');
            $table->dropColumn('nid');
            $table->dropColumn('gender');
            $table->dropColumn('blood_group');
            $table->dropColumn('education_qualification');
            $table->dropColumn('profession');
            $table->dropColumn('other_expertise');

            $table->dropColumn('country');
            $table->dropColumn('division');
            $table->dropColumn('district');

            $table->dropColumn('membership_type');

        });
    }
};
