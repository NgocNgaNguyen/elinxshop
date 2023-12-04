<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaisanpham_id')->constrained('loaisanpham');
            $table->foreignId('hangsanxuat_id')->constrained('hangsanxuat');
            $table->string('tensanpham');
            $table->string('tensanpham_slug');
            $table->integer('soluong');
            $table->double('dongia');
            $table->double('khuyenmai');
            $table->double('dongia_khuyenmai');
            $table->string('baohanh')->nullable();
            $table->string('hinhanh')->nullable();
            $table->text('motasanpham')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sanpham');
    }
};
