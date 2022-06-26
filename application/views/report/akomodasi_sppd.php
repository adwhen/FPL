<table border=1>
    <thead>
        <th>NO</th>
        <th>BAGIAN</th>
        <th>NO. SPPD</th>
        <th>JENIS SPPD</th>
        <th>AKOMODASI</th>
        <th>ACARA</th>
        <th>RINCIAN PESANAN</th>
        <th>TANGGAL KEGIATAN</th>
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