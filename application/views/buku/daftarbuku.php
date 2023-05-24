<?= $this->session->flashdata('pesan'); ?>

<?= form_error("nama"); ?>
<?= form_error("alamat"); ?>
<?= form_error("email"); ?>
<?= form_error("password"); ?>
<?= form_error("password1"); ?>
<?= form_error("password2"); ?>


<div style="padding: 25px;">
    <div class="x_panel">
        <div class="x_content">
        <!-- Tampilkan semua produk -->
            <div class="row">
            <!-- looping products -->
                <?php foreach ($buku as $buku) { ?>
                <div class="col-md-2 col-md-3">
                    <div class="thumbnail" style="height: 370px;">
                        <img src="<?php echo base_url('assets/img/upload/') . $buku->image; ?>" style="max-width:100%; max-height: 100%; height: 200px; width: 180px">
                        <div class="caption">
                            <h5 style="min-height:30px;"><?= $buku->pengarang ?></h5>
                            <h5><?= $buku->penerbit ?></h5>
                            <h5><?= substr($buku->tahun_terbit, 0, 4) ?></h5><p>
                            <?php
                            if ($buku->stok < 1) 
                            {
                                echo "<i class='btn btn-outline-primary fas fw fa-shopping-cart'> Booking&nbsp;&nbsp 0</i>";
                            } else {
                                echo "<a class='btn btn-outline-primary fas fw fa-shopping-cart' href='" . base_url('booking/tambahBooking/' . $buku->id) . "'> Booking</a>";
                            }
                            ?>
                            <a class="btn btn-outline-warning fas fw fa-search" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"> Detail</a></p>
                        </div>
                    </div>
                </div> 
                <?php } ?>
            <!-- end looping -->
            </div>
        </div>
    </div>
</div>