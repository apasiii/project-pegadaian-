<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pegawai extends Model
{
    use HasFactory;
    protected $table = 'data_pegawai';
    protected $guarded = [];
    // protected $fillable = [
    //     'nama',
    //     'nomor_identitas',
    //     'alamat',
    //     'nomor_telepon',
    // ];
}
