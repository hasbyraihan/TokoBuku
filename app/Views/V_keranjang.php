<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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
            <button type="submit" class="btn btn-primary">Lanjut</button>
        </form>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
