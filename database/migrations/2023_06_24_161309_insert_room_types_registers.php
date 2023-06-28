<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insertar registros en la tabla room_types
        DB::table('room_types')->insert([
            ['name' => 'Estandar', 'accommodation' => 'Sencilla'],
            ['name' => 'Estandar', 'accommodation' => 'Doble'],
            ['name' => 'Junior', 'accommodation' => 'Triple'],
            ['name' => 'Junior', 'accommodation' => 'Cuadruple'],
            ['name' => 'Suite', 'accommodation' => 'Sencilla'],
            ['name' => 'Suite', 'accommodation' => 'Doble'],
            ['name' => 'Suite', 'accommodation' => 'Triple'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
