<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        td { padding: 8px; }
        .label { width: 30%; font-weight: bold; }
    </style>
</head>
<body>
    <h3>Data Pasien</h3>
    <table>
        <tr>
            <td class="label">Nama Pasien</td>
            <td>: {{ $pasien['nama'] }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>: {{ $pasien['alamat'] }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Lahir</td>
            <td>: {{ $pasien['tanggal_lahir'] }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td>: {{ $pasien['jenis_kelamin'] }}</td>
        </tr>
    </table>
</body>
</html>
