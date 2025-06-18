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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>