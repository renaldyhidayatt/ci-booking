<div class="container mx-auto">
	<center>
		<table>
			<?php foreach ($useraktif as $u) { ?>
				<tr>
					<td nowrap>Terima Kasih <b><?= $u->nama; ?></b></td>
				</tr>
				<tr>
					<td>Buku Yang ingin Anda Pinjam Adalah Sebagai berikut:</td>
				</tr>
			<?php } ?>
			<tr>
				<td>
					<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
						<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="table-datatable">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th scope="col" class="px-6 py-3">
										No.
									</th>
									<th scope="col" class="px-6 py-3">
										Buku
									</th>
									<th scope="col" class="px-6 py-3">
										Penulis
									</th>
									<th scope="col" class="px-6 py-3">
										Penerbit
									</th>
									<th scope="col" class="px-6 py-3">
										Tahun
									</th>
								</tr>


							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($items as $i) { ?>
									<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
										<td class="px-6 py-4">
											<?= $no; ?>
										</td>
										<td class="px-6 py-4">
											<img src="<?= base_url('assets/img/upload/' . $i['image']); ?>" class="rounded" alt="No Picture" width="10%">
										</td>
										<td class="px-6 py-4" nowrap><?= $i['pengarang']; ?></td>
										<td class="px-6 py-4" nowrap><?= $i['penerbit']; ?></td>
										<td class="px-6 py-4" nowrap><?= $i['tahun_terbit']; ?></td>
									</tr>
								<?php $no++;
								} ?>


							</tbody>

						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<hr>
				</td>
			</tr>
			<tr>
				<td>
					<a class="mt-8 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="information('Waktu Pengambilan Buku 1x24 jam dari Booking!!!')" href="<?php echo base_url() . 'booking/exportToPdf/' . $this->session->userdata('id_user'); ?>">
						<span class="fas fa-file-pdf"></span> Pdf
					</a>
				</td>
			</tr>
		</table>
	</center>
</div>