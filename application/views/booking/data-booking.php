<div class="container mx-auto mt-50">
	<center>
		<div class="w-full overflow-x-auto">
			<table class="table-auto border border-collapse border-gray-800">
				<thead>
					<tr>
						<th class="border border-gray-800 p-2">No.</th>
						<th class="border border-gray-800 p-2">Buku</th>
						<th class="border border-gray-800 p-2">Penulis</th>
						<th class="border border-gray-800 p-2">Penerbit</th>
						<th class="border border-gray-800 p-2">Tahun</th>
						<th class="border border-gray-800 p-2">Pilihan</th>
					</tr>
				</thead>
				<tbody>
					<!-- Repeat this section for each item in the array -->
					<?php
					$no = 1;
					foreach ($temp as $t) {

					?>
						<tr>
							<td class="border border-gray-800 p-2"><?= $no; ?></td>
							<td class="border border-gray-800 p-2">
								<img src="<?= base_url('assets/img/upload/' . $t['image']); ?>" class="rounded" alt="No Picture" width="10%">
							</td>
							<td class="border border-gray-800 p-2"><?= $t['penulis']; ?></td>
							<td class="border border-gray-800 p-2"><?= $t['penerbit']; ?></td>
							<td class="border border-gray-800 p-2"><?= substr(
																		$t['tahun_terbit'],
																		0,
																		4
																	); ?></td>
							<td class="border border-gray-800 p-2">
								<a href="t.id_buku" onclick="confirm('Yakin tidak Jadi Booking t.judul_buku')">
								
									<i class=" focus:outline-none text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-900 fas fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php
						$no++;
					}
					?>
					<!-- End of repeated section -->
				</tbody>
			</table>
		</div>
	</center>
	<hr />
	<div class="flex justify-center mt-8">
		<a href="<?php echo base_url(); ?>" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">

			<span class="fas fa-play"></span> Lanjutkan Booking Buku
		</a>
		<a href="<?php echo base_url() . 'booking/bookingSelesai/' . $this->session->userdata('id_user'); ?>" class="btn btn-sm btn-outline-successfocus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
			<span class="fas fa-stop"></span> Selesaikan Booking
		</a>
	</div>
</div>