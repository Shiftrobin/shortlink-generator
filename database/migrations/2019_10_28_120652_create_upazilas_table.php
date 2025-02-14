<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpazilasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('upazilas')) {
            Schema::create('upazilas', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('division_id');
                $table->integer('district_id');
                $table->string('name');
                $table->integer('created_by')->nullable();
                $table->integer('modified_by')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upazilas');
    }
}
