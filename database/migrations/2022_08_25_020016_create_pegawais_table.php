<?php

use App\Models\Jabatan;
use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Unit::class)->constrained('unit')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignIdFor(Jabatan::class)->constrained('jabatan')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('nip')->unique();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->date('dob');
            $table->smallInteger('gender');
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
        Schema::dropIfExists('pegawais');
    }
}
