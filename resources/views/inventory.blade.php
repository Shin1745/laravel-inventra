<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventra - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-primary">📦 Inventra Stock Management</h2>
        
        <div class="row">
            <!-- Form Tambah Barang -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title mb-3">Tambah Barang</h5>
                    <!-- Pesan Error Validasi -->
@if ($errors->any())
    <div class="alert alert-danger py-2">
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li><small>{{ $error }}</small></li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="/items" method="POST">
                        @csrf
                        <input type="hidden" name="category_id" value="1">
                        <div class="mb-2">
                            <label class="form-label">Kode Barang</label>
                            <input type="text" name="item_code" class="form-control" placeholder="Contoh: BRG-003" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Keyboard Mechanical" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stock" class="form-control" value="10" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga (IDR)</label>
                            <input type="number" name="price" class="form-control" value="500000" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan Barang</button>
                    </form>
                </div>
            </div>

            <!-- Tabel Daftar Barang -->
            <div class="col-md-8">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title mb-3">Daftar Inventaris</h5>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                <tr>
                                    <td><code>{{ $item->item_code }}</code></td>
                                    <td>{{ $item->name }}</td>
                                    <td><span class="badge bg-success">{{ $item->stock }} pcs</span></td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data barang. Silakan tambah melalui form.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>