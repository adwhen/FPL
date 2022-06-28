<center>
    <tr>
        <td colspan="5"><b>PELAYANAN UMUM</b></td>
    </tr>
</center>
<br>
<table border=1>
    <thead>
        <th>No</th>
        <th>Bagian</th>
        <th>Bentuk Pemohonan</th>
        <th>Tujuan/Keperluan</th>
        <th>Rincian Pesanan</th>
    </thead>
    <tbody>
        <?php $x = 1;
        foreach ($DATA as $s) : ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $s->UNIT_KERJA ?></td>
                <td><?= $s->BENTUK_UMUM ?></td>
                <td><?= $s->TUJUAN_UMUM ?></td>
                <td><?= $s->RINCIAN_PESANAN ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>