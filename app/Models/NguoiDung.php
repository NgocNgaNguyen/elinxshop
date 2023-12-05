<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NguoiDung extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'nguoidung';
    protected $fillable = [
        'name',
        'email',
        'username',
        'role',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function DonHang(): HasMany
    {
        return $this->hasMany(DonHang::class, 'nguoidung_id', 'id');
    }
}
