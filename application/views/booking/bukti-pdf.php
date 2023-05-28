<style>
    .table-container {
        overflow-x: auto;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container th,
    .table-container td {
        padding: 8px;
        text-align: left;
    }

    .table-container th {
        background-color: #f2f2f2;
    }

    .table-container .center {
        text-align: center;
    }

    @media only screen and (max-width: 600px) {
        .table-container table,
        .table-container th,
        .table-container td {
            font-size: 12px;
        }
    }
</style>

<div class="table-container">
    <table border="1">
        <?php foreach ($useraktif as $u) { ?>
            <tr>
                <th>Nama Anggota: <?= $u->nama; ?></th>
            </tr>
            <tr>
                <th>Buku Yang Dibooking:</th>
            </tr>
        <?php } ?>
        <tr>
            <td>
                <table border="1">
                    <tr>
                        <th>No.</th>
                        <th>Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($items as $i) {
                        ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $i['judul_buku']; ?></td>
                            <td><?= $i['pengarang']; ?></td>
                            <td><?= $i['penerbit']; ?></td>
                            <td><?= $i['tahun_terbit']; ?></td>
                        </tr>
                        <?php $no++;
                    } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr>
            <td class="center">
                <?= date('d M Y H:i:s') ?>
            </td>
        </tr>
    </table>
</div>
