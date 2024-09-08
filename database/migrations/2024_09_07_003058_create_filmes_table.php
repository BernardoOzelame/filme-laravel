<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sinopse');
            $table->integer('ano');
            $table->string('categoria');
            $table->string('linkTrailer');
            $table->timestamps();
        });
    }

    public function down(): void{
        Schema::dropIfExists('filmes');
    }
};
