<?php

namespace App\Controllers;
use App\Models\M_barang;
use App\Models\M_jual;
use App\Models\M_penjualan;

class C_Barang extends BaseController
{
    
    public function index()
    {
        $perPage = $this->request->getGet('perPage') ?: 5;
        $model = new M_barang();
        
        $page = $this->request->getGet('page') ?: 1;
        $totalPages = $model->getPageCount($perPage);
        $totalRows = $model->getTotalRows();
        
        $data = [
            'barang' => $model->getPaginatedData($perPage, $page),
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalRows' => $totalRows,
            'perPage' => $perPage,
        ];

        return view('V_display_barang', $data);
    }

    public function deleteBarang($id_barang)
    {
        $barang = new M_barang();
        
        $dataBarang = $barang->getBarangById($id_barang);
        
        $gambar_barang = $dataBarang['gambar_barang'];
        
        $path = './img/gambar_barang/' . $gambar_barang;
        if (file_exists($path)) {
            unlink($path);
        }
        
        $barang->deleteBarang($id_barang);
        
        return redirect()->to('/barang');
    }

    public function detailBarang($id_barang)
    {
        $barang = new M_barang();
        $data['barang'] = $barang->getBarangById($id_barang);

        return view('v_detail_barang', $data);
    }

    public function edit($id_barang)
    {
        $barang = new M_barang();
        $data['barang'] = $barang->getBarangById($id_barang);

        return view('v_update_barang', $data);
    }

    public function searchBarang()
    {
        $keyword = $this->request->getPost('keyword');
        $perPage = $this->request->getGet('perPage');
        $currentPage = $this->request->getGet('page');
        $totalPages = $this->request->getGet('totalPages');
        $totalRows = $this->request->getGet('totalRows');

        $barang = new M_barang();

        $data['barang'] = $barang->searchBarang($keyword);
        $data['perPage'] = $perPage;
        $data['currentPage'] = $currentPage;
        $data['totalPages'] = $totalPages;
        $data['totalRows'] = $totalRows;

        return view('V_display_barang', $data);
    }

    public function insertBarang()
    {
        $request = service('request');
        
        $barang = new M_barang();
        $gambar_barang = $request->getFile('gambar_barang');

        if ($gambar_barang->isValid() && !$gambar_barang->hasMoved()) {
            $gambar_barang->move('./img/gambar_barang', $gambar_barang->getName());
            $data = [
                'id_barang' => $request->getPost('id_barang'),
                'gambar_barang' => $gambar_barang->getName(),
                'nama_barang' => $request->getPost('nama_barang'),
                'harga_barang' => $request->getPost('harga_barang'),
                'stok_barang' => $request->getPost('stok_barang')
            ];

            $barang->insertBarang($data);

            return redirect()->to(base_url('/barang'));
        }
    }

    public function update($id_barang)
    {
        $request = service('request');

        $data = [
            'nama_barang' => $request->getPost('nama_barang'),
            'harga_barang' => $request->getPost('harga_barang'),
            'stok_barang' => $request->getPost('stok_barang'),
        ];

        if ($request->getFile('gambar_barang')->isValid()) {
            $gambar_barang = $request->getFile('gambar_barang');

            $barangModel = new M_barang();
            $oldPhoto = $barangModel->getBarangById($id_barang)['gambar_barang'];
            unlink(FCPATH . 'img/gambar_barang/' . $oldPhoto);

            $gambar_barang->move('./img/gambar_barang', $gambar_barang->getName());
            $data['gambar_barang'] = $gambar_barang->getName();
        }

        $barangModel = new M_barang();
        $barangModel->updateBarang($id_barang, $data);

        return redirect()->to(base_url('/barang'));
    }

    public function displayInput(): string
    {
        return view('v_forM_barang');
    }

    public function home()
    {
        $perPage = $this->request->getGet('perPage') ?: 5;
        $model = new M_barang();
        
        $page = $this->request->getGet('page') ?: 1;
        $totalPages = $model->getPageCount($perPage);
        $totalRows = $model->getTotalRows();
        
        $data = [
            'barang' => $model->getPaginatedData($perPage, $page),
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'totalRows' => $totalRows,
            'perPage' => $perPage,
        ];

        return view('V_home_toko', $data);
    }

    public function addToCart()
    {
        $session = session();
        $id_barang = $this->request->getPost('id_barang');
        $quantity = $this->request->getPost('quantity');

        $model = new M_barang();
        $barang = $model->getBarangById($id_barang);

        $cart = $session->get('cart') ?: [];

        if (isset($cart[$id_barang])) {
            $cart[$id_barang]['quantity'] += $quantity;
        } else {
            $cart[$id_barang] = [
                'id_barang' => $barang['id_barang'],
                'nama_barang' => $barang['nama_barang'],
                'harga_barang' => $barang['harga_barang'],
                'quantity' => $quantity
            ];
        }

        $session->set('cart', $cart);

        return redirect()->to(base_url('/cart'));
    }

    public function viewCart()
    {
        $session = session();
        $cart = $session->get('cart') ?: [];

        $data = [
            'cart' => $cart
        ];

        return view('V_keranjang', $data);
    }

    public function checkout()
    {
        return view('V_checkout');
    }

    public function complete_checkout()
    {
        $session = session();
        $cart = $session->get('cart') ?: [];
        
        if (empty($cart)) {
            return redirect()->to(base_url('/cart'));
        }

        $nama = $this->request->getPost('nama');
        $nomor_telepon = $this->request->getPost('nomor_telepon');
        $alamat = $this->request->getPost('alamat');
        $kode_pos = $this->request->getPost('kode_pos');
        $total_penjualan = 0;

        foreach ($cart as $item) {
            $total_penjualan += $item['harga_barang'] * $item['quantity'];
        }

        $model = new M_penjualan();
        $id_penjualan = $model->insertPenjualan([
            'nama' => $nama,
            'nomor_telepon' => $nomor_telepon,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'tanggal_penjualan' => date('Y-m-d'),
            'total_penjualan' => $total_penjualan,
        ]);

        $modelJual = new M_jual();
        $modelBarang = new M_barang();
        foreach ($cart as $item) {
            $modelJual->insertJual([
                'id_penjualan' => $id_penjualan,
                'id_barang' => $item['id_barang'],
                'kuantitas' => $item['quantity'],
                'harga_jual' => $item['harga_barang']
            ]);

            
            $modelBarang->reduceStock($item['id_barang'], $item['quantity']);
        }

        $session->set('checkout_data', [
            'nama' => $nama,
            'nomor_telepon' => $nomor_telepon,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'cart' => $cart,
            'total_penjualan' => $total_penjualan
        ]);

        return redirect()->to(base_url('/success'));
    }

    public function success()
    {
        $session = session();
        $checkout_data = $session->get('checkout_data');

        if (!$checkout_data) {
            return redirect()->to(base_url('/'));
        }

        $session->remove('cart');
        return view('V_success', $checkout_data);
    }
}
