<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('completion_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('requesting_office');
            $table->string('control_no');
            $table->date('date_requested');
            $table->text('service_requested');
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completion_forms');
    }
};
