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
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->foreignId('petugas_id')->after('id')->constrained('petugas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('siswa_id')->after('petugas_id')->constrained('siswas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('spp_id')->after('tahun_dibayar')->constrained('spps')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            //
        });
    }
};
