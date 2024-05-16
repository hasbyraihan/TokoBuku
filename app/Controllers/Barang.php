<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        $model = new BukuModel();
        $data['barang'] = $model->findAll();
        return view('welcome_message', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        $model = new BukuModel();
        
        $gambar = $this->request->getFile('gambar_barang');
        $gambarNama = $gambar->getRandomName();
        $gambar->move('uploads', $gambarNama);
        
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'gambar_barang' => $gambarNama,
            'deskripsi_barang' => $this->request->getPost('deskripsi_barang'),
            'harga_barang' => $this->request->getPost('harga_barang'),
            'stok_barang' => $this->request->getPost('stok_barang'),
        ];

        $model->save($data);
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $model = new BukuModel();
        $data['barang'] = $model->find($id);
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $model = new BukuModel();
        
        $gambar = $this->request->getFile('gambar_barang');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambarNama = $gambar->getRandomName();
            $gambar->move('uploads', $gambarNama);
        } else {
            $gambarNama = $this->request->getPost('old_gambar_barang');
        }

        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'gambar_barang' => $gambarNama,
            'deskripsi_barang' => $this->request->getPost('deskripsi_barang'),
            'harga_barang' => $this->request->getPost('harga_barang'),
            'stok_barang' => $this->request->getPost('stok_barang'),
        ];

        $model->update($id, $data);
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $model = new BukuModel();
        $model->delete($id);
        return redirect()->to('/barang');
    }
}
