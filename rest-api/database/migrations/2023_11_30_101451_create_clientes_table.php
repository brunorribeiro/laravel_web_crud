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
        Schema::create('clientes', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();
            $table->integer('empresa')->unsigned();
            $table->string('razao_social', 255);
            $table->enum('tipo', ['PJ', 'PF']);
            $table->string('cpf_cnpj', 14);
            $table->timestamps();
            
            $table->foreign('empresa')
                ->references('id')->on('empresas')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
