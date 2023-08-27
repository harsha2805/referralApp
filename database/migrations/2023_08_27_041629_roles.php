<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->integer(10)->unsigned();
            $table->string('roles');
        });

        DB::table('roles')->insert([
            ['roles' => 'Admin'],
            ['roles' => 'User'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
