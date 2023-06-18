<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Main App</title>
</head>

<body>
<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <a href="#" class="text-white text-xl font-bold">Logo</a>
      </div>
      <div class="hidden md:block">
        <div class="ml-10 flex items-baseline space-x-4">
          <a href="<?php echo base_url('/home') ?>" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
          <a href="<?php echo base_url('/cart') ?>" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Keranjang</a>
          <a href="<?php echo base_url('/transaction') ?>" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Pesanan</a>
          <a href="<?php echo base_url('/account') ?>" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Akun</a>
        </div>
      </div>
    </div>
  </div>
</nav>

    <?= $this->renderSection('content') ?>
</body>

</html>