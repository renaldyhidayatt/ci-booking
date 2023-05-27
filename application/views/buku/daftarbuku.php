

<?= $this->session->flashdata('pesan'); ?>



<?= form_error("nama"); ?>
<?= form_error("alamat"); ?>
<?= form_error("email"); ?>
<?= form_error("password"); ?>
<?= form_error("password1"); ?>
<?= form_error("password2"); ?>

<div>
    <h1 class="text-2xl font-bold text-center mt-8">List Buku</h1>
    <div class="p-4">
        <div class="bg-white shadow">
            <div class="p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    <?php foreach ($buku as $buku) { ?>
                        <div key={book.id} class="col-span-1">
                            <div class="border border-gray-200 rounded-lg p-4 h-96">
                                <div class="flex justify-center">
                                <img src="<?= base_url('assets/img/upload/') . $buku->image; ?>" alt="Book Cover" class="h-52 w-full object-cover max-w-full max-h-full border border-gray-300 rounded-lg shadow-sm" style="height: 200px; width: 180px">


                                </div>
                                <div class="mt-4">
                                    <h5 class="min-h-6 text-center"><?= $buku->pengarang ?></h5>
                                    <h5 class="text-center"><?= $buku->penerbit ?></h5>
                                    <h5 class="text-center"><?= substr($buku->tahun_terbit, 0, 4) ?></h5>
                                    <p class="mt-8 flex justify-center"> <!-- Perubahan pada bagian ini -->
                                        <?php if ($buku->stok < 1) : ?>
                                            <button class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
                                                Stok Habis
                                            </button>
                                        <?php else : ?>
                                            <a href="<?= base_url('booking/tambahBooking/' . $buku->id) ?>" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
                                                Booking
                                            </a>
                                        <?php endif; ?>

                                        <a href="<?= base_url('home/detailBuku/' . $buku->id) ?>" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                            Detail
                                        </a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>