<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\room;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->double('room_area')->nullable();
            $table->integer('room_capacity')->nullable();
            $table->string('room_door')->nullable();
            $table->string('room_window')->nullable();
            $table->double('room_size')->nullable();
            $table->string('room_use')->nullable();
            $table->string('room_remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
