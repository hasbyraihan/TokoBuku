<?php

namespace App\Models;
use CodeIgniter\Model;

class M_barang extends Model {
    
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    public function getDataBarang()
    {
        $query = $this->db->query("SELECT * FROM barang");

        $result = $query->getResultArray();

        return $result;
    }

    public function getPaginatedData($perPage, $page)
    {
        $offset = ($page - 1) * $perPage;
        $query = $this->db->query("SELECT * FROM $this->table LIMIT $perPage OFFSET $offset");
        return $query->getResultArray();
    }

    public function getPageCount($perPage)
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM $this->table");
        $total = $query->getRow()->total;
        return ceil($total / $perPage);
    }

    public function getTotalRows()
    {
        return $this->countAllResults();
    }

    public function deleteBarang($id_barang)
    {
        $query = $this->db->query("DELETE FROM barang WHERE id_barang=$id_barang");
        return $query;
    }

    public function getBarangById($id_barang)
    {
        $sql = "SELECT * FROM barang WHERE id_barang=$id_barang";
        $query = $this->db->query($sql, $id_barang);
        return $query->getRowArray();
    }

    public function searchBarang($keyword)
    {
        $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%'";
        $query = $this->db->query($sql, $keyword);
        return $query->getResultArray();
    }

    public function insertBarang($data)
    {
        $id_barang = $data['id_barang'];
        $nama_barang = $data['nama_barang'];
        $gambar_barang = $data['gambar_barang'];
        $harga_barang = $data['harga_barang'];
        $stok_barang = $data['stok_barang'];
        $query = "INSERT INTO barang (id_barang, nama_barang, gambar_barang, harga_barang, stok_barang) VALUES ( ?, ?, ?, ?, ?)";
        $this->db->query($query, [$id_barang, $nama_barang, $gambar_barang, $harga_barang, $stok_barang]);

        return $this->db->insertID();
    }

    public function updateBarang($id_barang, $data)
    {
        $sql = "UPDATE barang SET nama_barang = ?, gambar_barang = ?, harga_barang = ?, stok_barang = ? WHERE id_barang = ?";
        
        $this->db->query($sql, [$data['nama_barang'], $data['gambar_barang'], $data['harga_barang'], $data['stok_barang'], $id_barang]);
        
        return $this->db->affectedRows();
    }

    public function reduceStock($id_barang, $quantity)
    {
        $sql = "UPDATE barang SET stok_barang = stok_barang - ? WHERE id_barang = ?";
        $this->db->query($sql, [$quantity, $id_barang]);
    }
}
