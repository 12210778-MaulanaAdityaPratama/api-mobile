<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable = ['*'];
    use HasFactory;
}
