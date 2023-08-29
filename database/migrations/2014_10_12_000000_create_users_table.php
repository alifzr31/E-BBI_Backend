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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->nullable()->references('id')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('guru_id')->nullable()->references('id')->on('gurus')->onUpdate('cascade')->onDelete('cascade');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'siswa', 'guru']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
