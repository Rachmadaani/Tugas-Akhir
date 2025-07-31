<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'pendaftaran'; // Ganti dengan nama tabel Anda
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_event',
        'kategori_event',
        'rute',
        'biaya',
        'nama_lengkap',
        'email',
        'no_hp',
        'alamat_lengkap',
        'id_provinsi',
        'id_kabupaten',
        'kewarganegaraan',
        'nama_bib',
        'no_identitas',
        'golongan_darah',
        'jenis_kelamin',
        'id_nama_nib',
        'no_identitas',
        'golongan_darah',
        'jenis_kelamin',
        'tanggal_lahir',
        'riwayat_penyakit',
        'ukuran_kaos',
        'kontak_darurat_nama_lengkap',
        'kontak_darurat_no_hp',
        'kontak_darurat_hubungan',
        'persetujuan_peserta',
        'jenis_pendaftaran',
        'created_at',
        'updated_at'
    ];

    public function getPesertaWithDetails()
    {
        return $this->db->table('pendaftaran')
            ->join('events', 'pendaftaran.id_event = events.id')
            ->join('kategori_event', 'pendaftaran.kategori_event = kategori_event.id')
            ->select('pendaftaran.*, events.event_name, kategori_event.nama_kategori, kategori_event.biaya, kategori_event.rute')
            ->get()->getResultArray();
    }

    public function getEventHistory($email)
    {
        return $this->db->table('pendaftaran')
            ->select('id, id_event, nama_lengkap, nama_event, kategori_event as nama_kategori, event_dimulai, kewarganegaraan, tanggal_mendaftar')
            ->where('email', $email)
            ->get()
            ->getResultArray();
    }

    public function getPendaftaranWithBiaya($id)
    {
        return $this->select('
            pendaftaran.*, 
            kategori_event.biaya AS biaya, 
            kategori_event.nama_kategori, 
            events.event_name
        ')
            ->join('kategori_event', 'kategori_event.id = pendaftaran.kategori_event')
            ->join('events', 'events.id = pendaftaran.id_event')
            ->where('pendaftaran.id', $id)
            ->first();
    }
}
