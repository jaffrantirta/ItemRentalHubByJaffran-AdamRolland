<!-- Extend the main template -->
<?= $this->extend('templates/main') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>

<div class="max-w-2xl mx-auto m-5">
  <div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold mb-4">Profil</h2>

    <div class="grid grid-cols-2 gap-4">
      <div class="col-span-2 sm:col-span-1">
        <label for="username" class="block text-sm font-medium text-gray-700">Nama</label>
        <p id="username" class="mt-1 text-sm text-gray-900"><?php echo session()->get('name') ?></p>
      </div>
      <div class="col-span-2 sm:col-span-1">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <p id="email" class="mt-1 text-sm text-gray-900"><?php echo session()->get('email') ?></p>
      </div>
    </div>

    <div class="mt-6">
      <a href="<?php echo base_url('logout') ?>" class="bg-red-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-full">Logout</a>
    </div>
  </div>
</div>

<!-- End the content section -->
<?= $this->endSection() ?>
