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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NISN');
            $table->string('NamaSiswa');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->unsignedBigInteger('id_Kelas');
            $table->string('qrcode');
            $table->timestamps();

            $table->foreign('id_Kelas')->references('id')->on('kelasis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
