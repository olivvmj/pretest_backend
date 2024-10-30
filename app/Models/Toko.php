<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Toko extends Model
{
    use HasFactory, SoftDeletes;

    // Menentukan nama tabel yang terkait
    protected $table = 'tokos';

    // Menentukan primary key
    protected $primaryKey = 'toko_id';

    // Mengizinkan mass assignment untuk kolom berikut
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
    ];

    // Menentukan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
