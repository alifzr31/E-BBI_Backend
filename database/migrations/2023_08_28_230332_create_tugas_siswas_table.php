<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->nullable()->references('id')->on('tugas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('siswa_id')->nullable()->references('id')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nilai')->nullable();
            $table->string('file_tugas_siswa')->nullable();
            $table->enum('status', ['ontime', 'late'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas_siswas');
    }
};
