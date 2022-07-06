<center>
    <tr>
        <td colspan="5"><b>JAMUAN DINAS</b></td>
    </tr>
</center>
<br>

<table border=1>
    <thead style="background-color: lightgray;">
        <th>NO</th>
        <th>BAGIAN</th>
        <th>JUMLAH ORANG</th>
        <th>JENIS JAMUAN</th>
        <th style="width: 40%;">RINCIAN PESANAN</th>
        <th>TEMPAT</th>
        <th>JAM PESANAN</th>
        <th>TANGGAL KEGIATAN</th>
    </thead>
    <tbody>
        <?php $x = 1;
        foreach ($DATA as $s) : ?>
            <tr>
                <td style="text-align:center;"><?= $x++; ?></td>
                <td><?= $s->UNIT_KERJA_J ?></td>
                <td style="text-align:center;"><?= $s->JUMLAH_J ?></td>
                <td><?= $s->NAMA_JENIS ?></td>
                <td><?= $s->RINCIAN_PESANAN ?></td>
                <td><?= $s->TEMPAT_J ?></td>
                <td><?= $s->WAKTU_M ?>-<?= $s->WAKTU_A ?></td>
                <td><?= $s->DATE_J ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>