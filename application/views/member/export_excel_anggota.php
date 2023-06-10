<?php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=' . $title . '.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>
<h3>
    <center>Laporan Data Anggota Perputakaan Online</center>
</h3>

<table class="table-data">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Anggota</th>
            <th>Email</th>
            <th>Role ID</th>
            <th>Aktif</th>
            <th>Member Sejak</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($anggota as $a) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $a['nama']; ?></td>
                <td><?= $a['email']; ?></td>
                <td><?= $a['role_id']; ?></td>
                <td><?= $a['is_active']; ?></td>
                <td><?= date('Y', $a['tanggal_input']); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>