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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('name', length: 80);
            $table->char('surnames', length: 80);
            $table->char('phone', length: 9)->unique();
            $table->enum('type_document', ['dni', 'ruc']);
            $table->char('document_number', length: 12)->unique();
            $table->char('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
