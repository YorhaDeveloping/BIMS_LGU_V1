<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Maintenance;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('buildings_name')->nullable();
            $table->integer('rooms_name');
            $table->string('floor')->nullable();
            $table->string('location_description')->nullable();
            $table->string('maintenance_type')->nullable();
            $table->string('issue_description')->nullable();
            $table->string('priority')->nullable();
            $table->string('attachments')->nullable();
            $table->string('submitter_name')->nullable();
            $table->string('submitter_email')->nullable();
            $table->integer('submitter_phone');
            $table->date('submittion_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
