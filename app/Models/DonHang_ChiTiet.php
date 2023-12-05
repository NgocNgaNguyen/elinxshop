<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class DonHang_ChiTiet extends Model
{
    protected $table = 'donhang_chitiet';
    public function DonHang(): BelongsTo
    {
    return $this->belongsTo(DonHang::class, 'donhang_id', 'id');
    }
    public function SanPham(): BelongsTo
    {
    return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}
