<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    
    protected $table = 'user_models';
    protected $fillable = ['username', 'password', 'phone', 'email', 'user_img', 'user_role'];

}