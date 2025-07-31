<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestEventModel extends Model
{
    protected $table = 'request_event';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_pengusul', 'no_hp', 'email', 'nama_event', 'tanggal_event', 'lokasi', 
        'deskripsi_event', 'gambar_event', 'nama_kategori', 'deskripsi_kategori',
        'biaya', 'rute', 'tanggal_dimulai', 'jam_dimulai', 'cut_off_time',
        'keterangan', 'created_at', 'updated_at'
    ];
}
