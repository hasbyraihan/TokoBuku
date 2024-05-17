<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container border mb-4 mt-4 rounded shadow bg-white">
        <h1 class="mt-5 mb-4">Nota Pembelian</h1>
        <div class="mb-4">
            <h5>Data Pembeli</h5>
            <p>Nama: <?= esc($nama) ?></p>
            <p>Nomor Telepon: <?= esc($nomor_telepon) ?></p>
            <p>Alamat: <?= esc($alamat) ?></p>
            <p>Kode Pos: <?= esc($kode_pos) ?></p>
        </div>
        <div class="mb-4">
            <h5>Rincian Pesanan</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td><?= esc($item['nama_barang']) ?></td>
                            <td>Rp <?= number_format($item['harga_barang'], 0, ',', '.') ?></td>
                            <td><?= esc($item['quantity']) ?></td>
                            <td>Rp <?= number_format($item['harga_barang'] * $item['quantity'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp <?= number_format($total_penjualan, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Kembali ke Daftar Barang</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
