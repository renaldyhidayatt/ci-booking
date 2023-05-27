<div class="container mx-auto">
  <div class="flex justify-center">
    <div class="w-full max-w-2xl">
      <div class="bg-white shadow-md rounded-lg px-8 py-6">
        <h2 class="text-2xl font-semibold mb-6 text-center">Ubah Profil</h2>
        <?= form_open_multipart('member/ubahprofil'); ?>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="text" class="form-input mt-1 block w-full" id="email" name="email" value="<?= $email; ?>" readonly>
        </div>
        <div class="mt-4">
          <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" class="form-input mt-1 block w-full" id="nama" name="nama" value="<?= $user; ?>">
          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="flex items-center mt-4">
          <div class="mr-4">Gambar</div>
          <div class="flex items-center">
            <div class="w-32">
              <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="img-thumbnail" alt="">
            </div>
            <div class="ml-4">
              <div class="relative">
                <input type="file" class="hidden" id="image" name="image">
                <label for="image" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Pilih file</label>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-center mt-6">
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-4 focus:ring-blue-300">Ubah</button>
          <button class="bg-gray-800 hover:bg-gray-900 text-white font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none focus:ring-4 focus:ring-gray-300" onclick="window.history.go(-1)">Kembali</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>
