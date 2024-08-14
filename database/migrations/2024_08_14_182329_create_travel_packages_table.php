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
        Schema::create('travel_packages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('travel_agency_id')->constrained('travel_agencies')->onDelete('cascade');  
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2); // Adjust precision as needed
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('max_participants');
            $table->string('image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_packages');
    }
};
