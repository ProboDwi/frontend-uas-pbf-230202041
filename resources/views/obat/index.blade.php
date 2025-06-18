<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body shadow-sm" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-white" href="#">
                <i class="bi bi-mortarboard-fill me-2"></i>PNC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}"><i class="bi bi-house-door-fill me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('pasien.index') }}"><i class="bi bi-people-fill me-1"></i>Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('obat.index') }}"><i class="bi bi-people-fill me-1"></i>Obat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-semibold">Daftar Obat</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahObat">
                <i class="bi bi-plus-circle me-1"></i>Tambah Obat
            </button>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_obat'] }}</td>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['stok'] }}</td>
                        <td>{{ $item['harga'] }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal"
                                data-id="{{ $item['id'] }}"
                                data-nama_obat="{{ $item['nama_obat'] }}"
                                data-kategori="{{ $item['kategori'] }}"
                                data-stok="{{ $item['stok'] }}"
                                data-harga="{{ $item['harga'] }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <form action="{{ route('obat.destroy', $item['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            <a href="{{ route('obat.exportPdfPerData', $item['id']) }}" class="btn btn-sm btn-danger">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Obat-->
    <div class="modal fade" id="tambahObat" tabindex="-1" aria-labelledby="tambahObatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('obat.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahObatLabel">Tambah Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" name="nama_obat" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <input type="text" class="form-control" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="decimal" class="form-control" name="harga" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Obat -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editForm" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Obat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label>Nama Obat</label>
                        <input type="text" name="nama_obat" id="edit-nama_obat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <input type="text" name="kategori" id="edit-kategori" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" id="edit-stok" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="decimal" name="harga" id="edit-harga" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll(".edit-btn");
            const editForm = document.getElementById("editForm");

            editButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const id = this.dataset.id;
                    const nama_obat = this.dataset.nama_obat;
                    const kategori = this.dataset.kategori;
                    const stok = this.dataset.stok;
                    const harga = this.dataset.harga;

                    document.getElementById("edit-id").value = id;
                    document.getElementById("edit-nama_obat").value = nama_obat;
                    document.getElementById("edit-kategori").value = kategori;
                    document.getElementById("edit-stok").value =stok;
                    document.getElementById("edit-harga").value =harga;

                    editForm.action = `/obat/${id}`;
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>