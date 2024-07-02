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
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('nis')->unique();
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('password');
            $table->enum('status', ['voted', 'unvoted'])->default('unvoted');
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
        Schema::dropIfExists('pemilihs');
    }
};
