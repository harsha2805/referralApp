<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->integer(10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');           
            $table->string('referal_key')->unique();
            $table->integer('start_position')->unsigned();
            $table->integer('role_type')->length(10)->default(2)->unsigned();
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            //$table->foreign('role_type')->references('id')->on('roles');
            
            
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
