<?php

namespace App\Models;
use CodeIgniter\Model;

class M_penjualan extends Model {
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $allowedFields = ['nama', 'nomor_telepon', 'alamat', 'kode_pos', 'tanggal_penjualan', 'total_penjualan'];

    public function insertPenjualan($data)
    {
        $sql = "INSERT INTO penjualan (nama, nomor_telepon, alamat, kode_pos, tanggal_penjualan, total_penjualan) VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, [$data['nama'], $data['nomor_telepon'], $data['alamat'], $data['kode_pos'], $data['tanggal_penjualan'], $data['total_penjualan']]);
        return $this->db->insertID();
    }
}
