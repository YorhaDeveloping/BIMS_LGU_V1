<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\building;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('building_name')->nullable();
            $table->string('building_structure')->nullable();
            $table->text('building_type')->nullable();
            $table->double('building_area')->nullable();
            $table->double('lot_area')->nullable();
            $table->string('building_location')->nullable();
            $table->string('building_in_charge')->nullable();
            $table->date('date_of_completion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
