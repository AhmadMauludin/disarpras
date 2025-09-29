<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Surat Bukti Peminjaman</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12pt;
        }

        h1 {
            text-align: left;
        }

        h2 {
            text-align: center;
        }

        .content {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        td {
            padding: 5px;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <h1><img src="<?= base_url('assets/' . "logoapk.jpg") ?>" height="50" /></h1>
    <h2>Surat Bukti Peminjaman Sarana</h2>
    <div class="content">
        <p>Yang bertanda tangan di bawah ini menyatakan bahwa:</p>
        <table>
            <tr>
                <td width="30%">Kode Peminjaman</td>
                <td>: <?= esc($peminjaman['id_peminjaman']) ?></td>
            </tr>
            <tr>
                <td width="30%">Nama Peminjam</td>
                <td>: <b><?= esc($peminjaman['nama_user']) ?></b></td>
            </tr>
            <tr>
                <td>Sarana</td>
                <td>: <b>[<?= esc($peminjaman['kode_sarana']) ?>] <?= esc($peminjaman['nama_sarana']) ?> | <?= esc($peminjaman['merk']) ?> - <?= esc($peminjaman['tipe']) ?></b></td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>: <?= esc($peminjaman['tanggal_pinjam']) ?></td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>: <?= esc($peminjaman['tanggal_kembali'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: <b><?= ucfirst($peminjaman['status']) ?></b></td>
            </tr>
        </table>

        <p style="margin-top: 30px;">Demikian surat bukti peminjaman ini dibuat untuk dipergunakan sebagaimana mestinya.</p>

        <table style="margin-top:50px; width:100%;">
            <tr>
                <td style="text-align:center;">
                    Peminjam <br><br><br>
                    (<?= esc($peminjaman['nama_user']) ?>)
                </td>
                <td style="text-align:center;">
                    Mengetahui <br><br><br>
                    (Admin / Kepala Sekolah)
                </td>
            </tr>
        </table>
    </div>
</body>

</html>