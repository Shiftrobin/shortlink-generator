<?php

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
        Schema::create('autologins', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('portal_name')->nullable();
			$table->text('portal_link')->nullable();
			$table->string('username')->nullable();
			$table->string('password')->nullable();
			$table->text('note')->nullable();
          	$table->integer('status')->default(1);
          	$table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autologins');
    }
};
