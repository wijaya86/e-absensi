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
        Schema::create('walikels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NIP');
            $table->string('NamaGuru');
            $table->unsignedBigInteger('id_Kelas');
            $table->unsignedBigInteger('id_akses');
            $table->timestamps();

           $table->foreign('id_Kelas')->references('id')->on('kelasis')->onDelete('cascade');
           $table->foreign('id_akses')->references('id')->on('aksesis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_walas');
    }
};
