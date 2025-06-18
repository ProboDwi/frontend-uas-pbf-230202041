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
            <h3 class="fw-semibold">Daftar Pasien</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPasien">
                <i class="bi bi-plus-circle me-1"></i>Tambah Pasien
            </button>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['alamat'] }}</td>
                        <td>{{ $item['tanggal_lahir'] }}</td>
                        <td>{{ $item['jenis_kelamin'] }}</td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal"
                                data-id="{{ $item['id'] }}"
                                data-nama="{{ $item['nama'] }}"
                                data-alamat="{{ $item['alamat'] }}"
                                data-tanggal_lahir="{{ $item['tanggal_lahir'] }}"
                                data-jenis_kelamin="{{ $item['jenis_kelamin'] }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <form action="{{ route('pasien.destroy', $item['id']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            <a href="{{ route('pasien.exportPdfPerData', $item['id']) }}" class="btn btn-sm btn-danger">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Pasien -->
    <div class="modal fade" id="tambahPasien" tabindex="-1" aria-labelledby="tambahPasienLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('pasien.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahpasienLabel">Tambah Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" name="jenis_kelamin" placeholder="Ketikkan L/P" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Dosen -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editForm" method="POST" class="modal-content">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama" id="edit-nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" name="alamat" id="edit-alamat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" id="edit-tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" id="edit-jenis_kelamin" placeholder="Ketikkan L/P" class="form-control" required>
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
                    const nama = this.dataset.nama;
                    const alamat = this.dataset.alamat;
                    const tanggal_lahir = this.dataset.tanggal_lahir;
                    const jenis_kelamin = this.dataset.jenis_kelamin;

                    document.getElementById("edit-id").value = id;
                    document.getElementById("edit-nama").value = nama;
                    document.getElementById("edit-alamat").value = alamat;
                    document.getElementById("edit-tanggal_lahir").value =tanggal_lahir;
                    document.getElementById("edit-jenis_kelamin").value =jenis_kelamin;

                    editForm.action = `/pasien/${id}`;
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>