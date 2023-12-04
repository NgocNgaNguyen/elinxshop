<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nguoidung_id')->constrained('users');
            // $table->foreignId('tinhtrang_id')->constrained('tinhtrang');
            $table->string('dienthoaigiaohang', 10);
            $table->string('diachigiaohang');
            $table->string('tinhtrang');
            $table->timestamps();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
