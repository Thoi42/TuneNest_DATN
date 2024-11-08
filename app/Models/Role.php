<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',	
        'description',	
        'publish',	
    ];

    // Thiết lập quan hệ một-nhiều với User
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
