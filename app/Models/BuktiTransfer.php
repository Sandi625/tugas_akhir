<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuktiTransfer extends Model
{
    protected $table = 'bukti_transfer'; // Nama tabel yang terkait dengan model

    protected $fillable = [
        'bukti', // Kolom yang dapat diisi secara massal
    ];
}
