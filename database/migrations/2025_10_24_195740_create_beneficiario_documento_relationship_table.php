<?php

use App\Models\Beneficiario;
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
        Schema::create('beneficiario_documento_relationship', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiario_id')->constrained('beneficiarios')->cascadeOnDelete();
            $table->foreignId('documento_id')->constrained('documentos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiario_documento_relationship');
    }
};
