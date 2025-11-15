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
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id_emp');
            $table->string('jabatan_id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('employees');
    }
};
