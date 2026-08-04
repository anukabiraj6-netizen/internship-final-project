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
        Schema::create('medicines', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->onDelete('cascade');

            $table->foreignId('pharmacy_id')
                  ->constrained('pharmacies')
                  ->onDelete('cascade');

            $table->string('medicine_name');

            $table->string('manufacturer');

            $table->string('batch_no');

            $table->date('expiry_date');

            $table->decimal('mrp', 10, 2);

            $table->integer('stock');

            $table->enum('availability', ['Available', 'Not Available']);

            $table->text('description')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
