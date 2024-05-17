<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Barang</h1>
        
        <div class="mb-3">
            <a class="btn btn-success" href="<?= base_url('/barang/input'); ?>" role="button">Input</a>
        </div>
        
        <div class="mb-3">
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
        </form>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID Barang</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($barang as $brg): ?>
                <tr>
                    <td><?= $brg['id_barang']; ?></td>
                    <td><img src="<?= base_url('img/gambar_barang/' . $brg['gambar_barang']); ?>" alt="<?= $brg['nama_barang']; ?>" style="max-width: 100px;"></td>
                    <td><?= $brg['nama_barang']; ?></td>
                    <td><?= $brg['harga_barang']; ?></td>
                    <td><?= $brg['stok_barang']; ?></td>
                    <td>
                        <a class="btn btn-primary me-2" href="<?= base_url('/barang/detail/' . $brg['id_barang']); ?>" role="button">View</a>
                        <a class="btn btn-danger me-2" href="<?= base_url('/barang/delete/' . $brg['id_barang']); ?>" role="button">Delete</a>
                        <a class="btn btn-warning" href="<?= base_url('/barang/edit/' . $brg['id_barang']); ?>" role="button">Update</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <nav aria-label="Page navigation">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+deYZq2ps5mDzlq8AfofC6QmRp1TV5lFuvzEd+4" crossorigin="anonymous"></script>
</body>
</html>
