<div class="mx-auto max-w-4xl mt-8">
    <div class="border border-gray-300 shadow-md rounded-lg p-4">
        <div class="flex justify-center">
            <img src="<?php echo base_url(); ?>assets/img/upload/<?= $gambar; ?>" alt="Book Thumbnail" class="h-40 w-48 object-contain" />
        </div>
        <div class="mt-4">
            <h5 class="text-center font-semibold"><?= $pengarang ?></h5>
            <div class="flex justify-center">
                <table class="table-auto">
                    <tbody>
                        <tr>
                            <th nowrap>Judul Buku: </th>
                            <td nowrap><?= $judul; ?></td>
                            <td>&nbsp;</td>
                            <th>Kategori: </th>
                            <td><?= $kategori ?></td>
                        </tr>
                        <tr>
                            <th nowrap>Penerbit: </th>
                            <td><?= $penerbit ?></td>
                            <td>&nbsp;</td>
                            <th>Dipinjam: </th>
                            <td><?= $dipinjam ?></td>
                        </tr>
                        <tr>
                            <th nowrap>Tahun Terbit: </th>
                            <td><?= substr($tahun, 0, 4) ?></td>
                            <td>&nbsp;</td>
                            <th>Dibooking: </th>
                            <td><?= $dibooking ?></td>
                        </tr>
                        <tr>
                            <th>ISBN: </th>
                            <td><?= $isbn ?></td>
                            <td>&nbsp;</td>
                            <th>Tersedia: </th>
                            <td><?= $stok ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center mt-4">
                <a href="<?= base_url('booking/tambahBooking/' . $id); ?>" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 mr-2">
                    <svg class="w-4 h-4 mr-1 fas fa-shopping-cart" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path fill="currentColor" d="M544 160h-80V99.37C464 44.38 419.09 0 364.16 0H211.84C156.91 0 112 44.38 112 99.37V160H32C14.33 160 0 174.33 0 192v224c0 17.67 14.33 32 32 32h32v32c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-32h32c17.67 0 32-14.33 32-32V192c0-17.67-14.33-32-32-32zM384 99.37c0-33.22 26.89-59.37 60.16-59.37h152.32c33.26 0 60.16 26.38 60.16 59.37v60.26H384V99.37zm176 352H384V232h176v219.37zM192 232v219.37H32V232h160zm-80 84v28h32v-28h-32zm0-72v28h32v-28h-32zm0-72v28h32v-28h-32zm0-72v28h32v-28h-32z"></path>
                    </svg>
                    Booking
                </a>
                <button onclick="window.history.go(-1)" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-100">
                    <svg class="w-4 h-4 mr-1 fas fa-reply" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M494.059 233.941H128V186.059H494.059L343.52 35.52 376.941 2.059 512 137.118 376.941 273.177 343.52 239.759 494.059 89.22z"></path>
                    </svg>
                    Kembali
                </button>
            </div>
        </div>
    </div>
</div>
