<table border=1>
    <thead>
        <th>NO</th>
        <th>BAGIAN</th>
        <th>JUMLAH ORANG</th>
        <th>JENIS JAMUAN</th>
        <th>RINCIAN PESANAN</th>
        <th>TEMPAT</th>
        <th>JAM PESANAN</th>
        <th>TANGGAL KEGIATAN</th>
    </thead>
    <tbody>
        <?php $x = 1;
        foreach ($DATA as $s) : ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $s->UNIT_KERJA_J ?></td>
                <td><?= $s->JUMLAH_J ?></td>
                <td><?= $s->NAMA_JENIS ?></td>
                <td><?= $s->RINCIAN_PESANAN ?></td>
                <td><?= $s->TEMPAT_J ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>