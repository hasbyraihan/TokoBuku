<?php

namespace App\Models;
use CodeIgniter\Model;

class M_jual extends Model {
    protected $table = 'jual';
    protected $allowedFields = ['id_penjualan', 'id_barang', 'kuantitas', 'harga_jual'];

    public function insertJual($data)
    {
        $sql = "INSERT INTO jual (id_penjualan, id_barang, kuantitas, harga_jual) VALUES (?, ?, ?, ?)";
        return $this->db->query($sql, [$data['id_penjualan'], $data['id_barang'], $data['kuantitas'], $data['harga_jual']]);
    }
}
