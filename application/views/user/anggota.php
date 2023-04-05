<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()){?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
            <?php }?>
            <?= $this->session->flashdata('pesan'); ?>
            <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bukuBaruModal"><i class="fas fa-file-alt"></i> Buku Baru</a> -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Image</th>
                        <th scope="col">Role ID</th>
                        <th scope="col">Is_Active</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 1;
                    foreach ($anggota as $b) { ?>
                    <tr>
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $b['nama']; ?></td>
                        <td><?= $b['email']; ?></td>
                        <td><?= $b['image']; ?></td>
                        <td><?= $b['role_id']; ?></td>
                        <td><?= $b['is_active']; ?></td>
                        <td><?= date('Y', $b['tanggal_input']); ?></td>
                        <td>
                            <a href="<?= base_url('buku/ubahBuku/').$b['id'];?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                            <a href="<?= base_url('buku/hapusbuku/').$b['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$b['judul_buku'];?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah buku baru-->
