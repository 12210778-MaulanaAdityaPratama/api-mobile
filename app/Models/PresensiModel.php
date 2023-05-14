<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiModel extends Model
{
    protected $table = 'presensi';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = ['*'];
    use HasFactory;
}
