<center>
    <tr>
        <td colspan="5"><b>AKOMODASI SPPD</b></td>
    </tr>
</center>
<br>
<table border=1>
    <thead>
        <th>NO</th>
        <th>BAGIAN</th>
        <th>NO. SPPD</th>
        <th>JENIS SPPD</th>
        <!-- <th>AKOMODASI</th> -->
        <th>ACARA</th>
        <th>RINCIAN PESANAN</th>
        <th>TANGGAL KEGIATAN</th>
    </thead>
    <tbody>
        <?php $x = 1;
        foreach ($DATA as $s) : ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $s->UNIT_KERJA_A ?></td>
                <td><?= $s->NOMOR_SPPD ?></td>
                <td><?= $s->NAMA_AJ ?></td>
                <!-- <td></td> -->
                <td><?= $s->ACARA_A ?></td>
                <td><?= $s->RINCIAN_PESANAN ?></td>
                <td><?= $s->TANGGAL_K_M ?> - <?= $s->TANGGAL_K_A ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>