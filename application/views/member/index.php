<div class="text-center">
  <?php $pesan = $this->session->flashdata('pesan'); ?>
  <?= $pesan; ?>
</div>
<div class="container mx-auto mt-10">
  <div class="flex justify-center">
    <div class="w-full max-w-2xl">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="max-w-xs mx-auto lg:col-span-1">
          <div class="bg-white shadow-lg rounded-lg overflow-hidden transform rotate-3">
            <div class="flex">
              <div class="w-1/3 lg:w-2/5">
                <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="w-full h-auto" alt="Profile Picture">
              </div>
              <div class="w-2/3 lg:w-3/5 p-4">
                <h5 class="text-xl font-semibold mb-2"><?= $user; ?></h5>
                <p class="text-gray-600"><?= $email; ?></p>
                <p class="text-sm text-gray-400 mt-4">Jadi member sejak: <br><b class="italic"><?= date('d F Y', $tanggal_input); ?></b></p>
              </div>
            </div>
            <div class="flex justify-end px-4 py-2">
              <a href="<?= base_url('member/ubahprofil'); ?>" class="btn btn-info">
                <span class="text-gray"><i class="fas fa-user-edit"></i> Ubah Profil</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
