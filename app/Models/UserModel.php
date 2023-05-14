<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    const CREATED_AT = 'dt_created';
    const UPDATED_AT = 'dt_updated';
    protected $fillable = ['*'];
    protected $hidden = ['password'];
    

    use HasFactory;
}
