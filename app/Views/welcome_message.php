<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasby Raihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="bg-secondary">
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

        <!-- Katalog-->
        <h3 class="text-center" id="Katalog">Buku yang Tersedia</h3>
        <div class="text-center w-50 mx-auto fw-light">Buku hanya tinggal 3 karena alhamdulillah kemarin pas bazzar sudah banyak terjual</div>

        <div class="row row-cols-md-3 row-cols-2 gx-5 p-5">
            <?php foreach ($barang as $item): ?>
            <div class="col mb-5" data-id="<?= $item['id_barang']; ?>" data-name="<?= $item['nama_barang']; ?>" data-price="<?= $item['harga_barang']; ?>" data-image="uploads/<?= $item['gambar_barang']; ?>">
                <div class="card shad">
                    <img src="/assets/images/<?= $item['gambar_barang']; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['nama_barang']; ?></h5>
                        <p class="card-text"><?= $item['deskripsi_barang']; ?></p>
                    </div>
                    <div class="card-footer d-md-flex">
                        <button class="btn  btn-sm btn-primary add-to-cart">Tambahkan</button>
                        <button class="btn btn-sm btn-danger remove-from-cart">Hapus</button>
                        <span class="ms-auto text-danger d-block text-center rounded-2">Rp. <?= number_format($item['harga_barang'], 0, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Chart -->
        <h1>Keranjang Belanja</h1>
        <div class="bg-body-secondary rounded-4 px-2 py-2" id="cart">
            <div id="total-price" class="bg-white rounded-3 text-center"></div>
            <div id="tax-amount" class="bg-white rounded-3 text-center"></div>
            <div id="total-price-with-tax" class="bg-white rounded-3 text-center"></div>
        </div>

        <!-- Info saya-->
        <div class="px-4 py-4 bg-secondary text-center rounded-3">
            <div class="mx-auto w-75">
                <h3 class="text-white" id="Tentang">Tentang Pemilik Toko</h3>
                <p class="text-center text-white">
                    <img src="images/Hasby.jpg" style="align-items:normal; width: 200px; height: auto" class="me-3 mb-3" /> Hasby Raihan Kelas D3-2A JTK<br>
                    Hasby adalah seorang yang penuh semangat dan cinta terhadap dunia literasi. Dengan mata yang berbinar, dia adalah seorang yang memiliki pengetahuan yang luas tentang berbagai jenis buku, penulis, dan aliran sastra. Kehangatan senyumannya dan sikap ramahnya selalu menyambut para pelanggan yang datang ke toko bukunya.
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
