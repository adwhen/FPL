<center>
    <tr>
        <td colspan="5"><b>PEMINJAMAN KENDARAAN</b></td>
    </tr>
</center>
<br>
<table border=1>
    <thead>
        <th>No</th>
        <th>Bagian</th>
        <th>Jenis Kendaraan</th>
        <th>Nama Pengemudi</th>
        <th>Jam Penggunaan</th>
        <th>Tanggal Kegiatan</th>
        <th>Kilometer Awal</th>
        <th>Tempat Tujuan</th>
        <th>Keperluan Acara</th>
    </thead>
    <tbody>
        <?php $x = 1;
        foreach ($DATA as $s) : ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $s->UNIT_KERJA_PK ?></td>
                <td><?= $s->PINJAM_KENDARAAN ?></td>
                <td><?= $s->PENGEMUDI ?></td>
                <td><?= $s->TIME_PK_AWAL ?> - <?= $s->TIME_PK_AKHIR ?></td>
                <td><?= $s->DATE_PK ?></td>
                <td><?= $s->SPEEDO_AWAL ?></td>
                <td><?= $s->TUJUAN_PK ?></td>
                <td><?= $s->PINJAM_KENDARAAN ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>