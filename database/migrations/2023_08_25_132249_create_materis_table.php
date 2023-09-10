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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_matpel_id')->references('id')->on('guru_matpels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelas_id')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul')->unique()->nullable();
            $table->string('subjudul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('file_materi')->nullable();
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
        Schema::dropIfExists('materis');
    }
};
