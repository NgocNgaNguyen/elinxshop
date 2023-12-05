<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';
    public function NguoiDung(): BelongsTo
    {
    return $this->belongsTo(NguoiDung::class, 'nguoidung_id', 'id');
    }
    public function DonHang_ChiTiet(): HasMany
    {
    return $this->hasMany(DonHang_ChiTiet::class, 'donhang_id', 'id');
    }
}
