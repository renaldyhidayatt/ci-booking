<div class="container mx-auto">
  <div class="flex justify-center">
    <div class="w-full lg:w-1/2 bg-white shadow-lg rounded-lg overflow-hidden">
      <div class="flex justify-center items-center p-4">
        <?= $this->session->flashdata('pesan'); ?>
      </div>
      <div class="flex">
        <div class="w-1/3">
          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="h-48 w-full object-cover" alt="Profile Image">
        </div>
        <div class="w-2/3 bg-gray-100">
          <div class="p-4">
            <h5 class="text-2xl font-semibold mb-2"><?= $user['nama']; ?></h5>
            <p class="text-gray-600 mb-4"><?= $user['email']; ?></p>
            <p class="text-sm text-gray-500">Jadi member sejak: <br><b><?= date('d F Y', $user['tanggal_input']); ?></b></p>
          </div>
          <div class="p-4 bg-blue-500 text-white">
            <a href="<?= base_url('user/ubahprofil'); ?>" class="text-white"><i class="fas fa-user-edit"></i> Ubah Profil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
