<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Sukses</title>
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
            <h1 class="mt-5 mb-4">Checkout Sukses</h1>
            <p>Terima kasih telah berbelanja. Pesanan Anda telah berhasil diproses.</p>
            <a href="<?= base_url('/'); ?>" class="btn btn-primary">Kembali ke Daftar Barang</a>
        </div>
    </div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
