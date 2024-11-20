<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $senha = Hash::make(1234);
        DB::insert("INSERT INTO users (name, email, password) VALUES ('teste', 'teste@teste.com', '{$senha}')");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::delete("DELETE FROM users WHERE email = 'teste@teste.com'");
    }
};
