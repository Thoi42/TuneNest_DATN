<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerResetToken extends Model
{
    use HasFactory;

    protected $primaryKey = 'email'; // Đặt email làm khóa chính
    public $incrementing = false; // Tắt tự tăng vì email không phải là số
    protected $keyType = 'string'; // Xác định kiểu khóa chính là chuỗi

    protected $fillable = ['email', 'token'];

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public function scopeCheckToken($q, $token)
    {
        return $q->where('token', $token)->firstOrFail();
    }
}
