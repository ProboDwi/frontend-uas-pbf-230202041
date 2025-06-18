<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Obat</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td { padding: 8px; }
        .label { width: 30%; font-weight: bold; }
    </style>
</head>
<body>
    <h3>Data Obat</h3>
    <table>
        <tr>
            <td class="label">Nama Obat</td>
            <td>: {{ $obat['nama_obat'] }}</td>
        </tr>
        <tr>
            <td class="label">Kategori</td>
            <td>: {{ $obat['kategori'] }}</td>
        </tr>
        <tr>
            <td class="label">Stok</td>
            <td>: {{ $obat['stok'] }}</td>
        </tr>
        <tr>
            <td class="label">Harga</td>
            <td>: {{ $obat['harga'] }}</td>
        </tr>
    </table>
</body>
</html>
