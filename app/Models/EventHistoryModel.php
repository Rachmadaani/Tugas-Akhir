<?php

namespace App\Models;

use CodeIgniter\Model;

class EventHistoryModel extends Model
{
    protected $table = 'pendaftaran'; // Menggunakan tabel pendaftaran
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = ['id_event', 'nama_lengkap', 'kategori_event', 'ukuran_kaos', 'kewarganegaraan'];

    public function getEventHistory($search = null)
    {
        $builder = $this->db->table($this->table)
            ->select('pendaftaran.id, pendaftaran.nama_lengkap, events.event_name as nama_event, 
                      kategori_event.nama_kategori, events.event_date as event_dimulai, 
                      pendaftaran.kewarganegaraan, pendaftaran.created_at as tanggal_mendaftar')
            ->join('events', 'pendaftaran.id_event = events.id', 'left')
            ->join('kategori_event', 'pendaftaran.kategori_event = kategori_event.id', 'left');

        if ($search) {
            $builder->like('pendaftaran.nama_lengkap', $search)
                ->orLike('events.event_name', $search)
                ->orLike('kategori_event.nama_kategori', $search);
        }

        return $builder->get()->getResultArray();
    }

    public function findHistoryById($id)
    {
        return $this->db->table($this->table)
            ->select('pendaftaran.id, pendaftaran.nama_lengkap, events.event_name as nama_event, 
                    kategori_event.nama_kategori, events.event_date as event_dimulai, 
                    events.location,  -- tambahkan ini!
                    pendaftaran.kewarganegaraan, pendaftaran.created_at as tanggal_mendaftar')
            ->join('events', 'pendaftaran.id_event = events.id', 'left')
            ->join('kategori_event', 'pendaftaran.kategori_event = kategori_event.id', 'left')
            ->where('pendaftaran.id', $id)
            ->get()
            ->getRowArray();
    }

    public function getHistoryById($id)
    {
        return $this->db->table('pendaftaran')
            ->select('
            pendaftaran.*,
            events.event_name,
            events.event_image,
            events.location,
            events.nama_panitia,
            events.ttd_panitia, 
            kategori_event.nama_kategori,
            kategori_event.start_date
        ')
            ->join('events', 'pendaftaran.id_event = events.id', 'left')
            ->join('kategori_event', 'pendaftaran.kategori_event = kategori_event.id', 'left')
            ->where('pendaftaran.id', $id)
            ->get()
            ->getRowArray();
    }
}
