<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role_id', // Thêm role_id để quản lý phân quyền
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Thiết lập quan hệ với Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Kiểm tra nếu người dùng là admin
    public function isAdmin()
    {
        return $this->role_id === 2; // role_id = 2 là admin
    }

    // Kiểm tra nếu người dùng là customer
    public function isCustomer()
    {
        return $this->role_id === 1; // role_id = 1 là khách hàng
    }
}
