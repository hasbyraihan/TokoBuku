<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container border mb-4 mt-4 rounded shadow bg-white">
        <!-- menu-->
        <nav class="d-md-flex p-4">
            <div><h1>iCashier</h1></div>
            <div class="ms-auto my-auto">
                <ul class="list-inline m-0">
                    <li class="list-inline-item mx-md-3"><a href="#Katalog" class="text-decoration-none text-dark fw-bold">Lihat Produk</a></li>
                    <li class="list-inline-item mx-md-3"><a href="#Tentang" class="text-decoration-none text-dark fw-bold">Tentang saya</a></li>
                </ul> 
            </div>
        </nav>
        <!--banner-->
        <div class="px-4 mb g-4 rounded-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuL8i2gbEi3PkgE6-rt8d5QsXLlwF3CjogYw&s" class="w-100">
        </div>

        <div class="container">
            <h1 class="mt-5 mb-4">Keranjang Belanja</h1>

            <?php if (empty($cart)): ?>
                <p>Keranjang belanja anda kosong.</p>
            <?php else: ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($cart as $item): 
                            $subtotal = $item['harga_barang'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                        <tr>
                            <td><?= $item['id_barang']; ?></td>
                            <td><?= $item['nama_barang']; ?></td>
                            <td><?= $item['harga_barang']; ?></td>
                            <td><?= $item['quantity']; ?></td>
                            <td><?= $subtotal; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-end mb-3">
                    <h4>Total: <?= $total; ?></h4>
                </div>
                <form action="<?= base_url('/cart/checkout'); ?>" method="get">
                    <a href="<?= base_url('/'); ?>" class="btn btn-primary ml-2">Kembali Milih Produk</a>
                    <button type="submit" class="btn btn-success ml-2">Lanjut Pembayaran</button>
                </form>
                
            <?php endif; ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
