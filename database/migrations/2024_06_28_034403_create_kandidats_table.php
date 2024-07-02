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
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->integer('no_urut');
            $table->string('nama_ketua');
            $table->string('nama_wakil');
            $table->string('kelas');
            $table->text('visi');
            $table->text('misi');
            $table->string('jurusan');
            $table->string('tahun_ajaran');
            $table->string('foto');
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
        Schema::dropIfExists('kandidats');
    }
};
