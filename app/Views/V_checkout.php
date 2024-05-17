<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri Pembeli</title>
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
            <h1 class="mt-5 mb-4">Data Diri Pembeli</h1>
            <form action="<?= base_url('/cart/complete_checkout'); ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
