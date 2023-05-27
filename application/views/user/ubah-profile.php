<div class="container mx-auto py-8">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h2 class="text-2xl font-semibold mb-6">Ubah Profil</h2>
      <form onSubmit="handleSubmit" enctype="multipart/form-data">
        <div class="mb-4">
          <label for="email" class="block mb-2">Email</label>
          <input
            type="text"
            class="form-input"
            id="email"
            name="email"
            value="user.email"
            onChange="handleChange"
          />
        </div>
        <div class="mb-4">
          <label for="nama" class="block mb-2">Nama Lengkap</label>
          <input
            type="text"
            class="form-input"
            id="nama"
            name="nama"
            value="user.nama"
            onChange="handleChange"
          />
        </div>
        <div class="mb-4">
          <div class="flex items-center">
            <div class="mr-4">Gambar</div>
            <div class="flex items-center">
              <div class="w-24">
                <img
                  src="{URL.createObjectURL(user.image)}"
                  class="img-thumbnail"
                  alt=""
                />
              </div>
              <div class="ml-4">
                <div class="relative">
                  <input
                    type="file"
                    class="hidden"
                    id="image"
                    name="image"
                    onChange="setUser({ ...user, image: e.target.files[0] })"
                  />
                  <label
                    for="image"
                    class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded"
                  >
                    Pilih file
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex justify-end">
          <button
            type="submit"
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800"
          >
            Ubah
          </button>
          <button
            class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700"
            onClick="window.history.go(-1)"
          >
            Kembali
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
