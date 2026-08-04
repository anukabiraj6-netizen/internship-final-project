<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pharmacy_id')
                  ->constrained('pharmacies')
                  ->onDelete('cascade');

            $table->foreignId('medicine_id')
                  ->constrained('medicines')
                  ->onDelete('cascade');

            $table->integer('quantity');

            $table->decimal('sale_price',10,2);

            $table->date('sale_date');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
