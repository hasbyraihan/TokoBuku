<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container border mb-4 mt-4 rounded shadow bg-white">
        <!-- menu-->
        <nav class="d-md-flex p-4">
            <div><h1>iCashier</h1></div>
            <div class="ms-auto my-auto">
                <ul class="list-inline m-0">
                    <li class="list-inline-item mx-md-3"><a href="#Katalog" class="text-decoration-none text-dark fw-bold">Lihat Produk</a></li>
                    <li class="list-inline-item mx-md-3"><a href="#Tentang" class="text-decoration-none text-dark fw-bold">Tentang Toko</a></li>
                </ul> 
            </div>
        </nav>
        <!--banner-->
        <div class="px-4 mb g-4 rounded-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuL8i2gbEi3PkgE6-rt8d5QsXLlwF3CjogYw&s" class="w-100">
        </div>

    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Barang</h1>
        
        
        <!-- <div class="mb-3">
        <form action="<?= base_url('/barang/search'); ?>" method="post" class="d-flex">
            <input type="hidden" name="perPage" value="<?= $perPage ?>">
            <input type="hidden" name="currentPage" value="<?= $currentPage ?>">
            <input type="hidden" name="totalPages" value="<?= $totalPages ?>">
            <input type="hidden" name="totalRows" value="<?= $totalRows ?>">
            <input class="form-control me-2" type="text" id="keyword" name="keyword" placeholder="Cari nama barang">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        </div>

        <form action="<?= base_url('/barang'); ?>" method="get" class="mb-3">
            <label for="perPage" class="form-label">Items Per Page:</label>
            <select name="perPage" id="perPage" class="form-select" onchange="this.form.submit()">
                <option value="2" <?= ($perPage == 2) ? 'selected' : ''; ?>>2</option>
                <option value="5" <?= ($perPage == 5) ? 'selected' : ''; ?>>5</option>
                <option value="10" <?= ($perPage == 10) ? 'selected' : ''; ?>>10</option>
            </select>
        </form> -->
        
        <div class="row row-cols-md-3 row-cols-2 gx-5 p-5">
            <?php foreach ($barang as $brg): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= base_url('img/gambar_barang/' . $brg['gambar_barang']); ?>" class="card-img-top" alt="<?= $brg['nama_barang']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $brg['nama_barang']; ?></h5>
                            <p class="card-text">Harga: <?= $brg['harga_barang']; ?></p>
                            <p class="card-text">Stok: <?= $brg['stok_barang']; ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="<?= base_url('/barang/addToCart'); ?>" method="post" class="d-flex">
                                <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">
                                <input type="number" name="quantity" class="form-control me-2" min="1" max="<?= $brg['stok_barang']; ?>" value="1">
                                <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination">
                <?php if ($currentPage > 1): ?>
                    <li class="page-item"><a class="page-link" href="<?= base_url('/barang?page=' . ($currentPage - 1) . '&perPage=' . $perPage); ?>">Previous</a></li>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($currentPage == $i) ? 'active' : ''; ?>"><a class="page-link" href="<?= base_url('/barang?page=' . $i . '&perPage=' . $perPage); ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
                
                <?php if ($currentPage < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="<?= base_url('/barang?page=' . ($currentPage + 1) . '&perPage=' . $perPage); ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <div>
            Showing <?= (($currentPage - 1) * $perPage) + 1; ?> to <?= min($currentPage * $perPage, $totalRows); ?> of <?= $totalRows; ?> entries
        </div>

                <!-- Info saya-->
        <div class="px-4 py-4 bg-secondary text-center rounded-3">
            <div class="mx-auto w-75">
                <h3 class="text-white" id="Tentang">Tentang Toko</h3>
                <p class="text-center text-white">
                    <img src="assets/images/TokoBuku.jpg" style="align-items:normal; width: 200px; height: auto" class="me-3 mb-3" /> Toko Literasi Gemilang<br>
                    Selamat datang di Literasi Gemilang, surga bagi para pecinta buku! Toko buku kami menawarkan berbagai macam koleksi buku, mulai dari fiksi hingga non-fiksi, sastra klasik hingga kontemporer, dan dari penulis lokal hingga internasional.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+deYZq2ps5mDzlq8AfofC6QmRp1TV5lFuvzEd+4" crossorigin="anonymous"></script>
</body>
</html>
