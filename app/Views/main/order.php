<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class='p-10'>
  <?php if($transactions ===  null){ ?>
    <div class="flex justify-center">
      <img class="w-64" src="https://img.freepik.com/premium-vector/shopping-cart-with-cross-mark-wireless-paymant-icon-shopping-bag-failure-paymant-sign-online-shopping-vector_662353-912.jpg" />
    </div>
    <p class="text-xl text-center">Tidak ada pesanan</p>
    <?php }else{ ?>
<table class="min-w-full divide-y divide-gray-200">
  <thead>
    <tr>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        No
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Kode transaksi
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Total harga
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Status
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Aksi
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    <?php foreach ($transactions as $key => $value) { ?>
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $key + 1 ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['reference_code'] ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo number_format($value['grand_total']) ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <?php if($value['status'] === 'unpaid') { ?>
              <div class="text-sm text-center bg-red-500 p-2 text-white rounded-full uppercase text-gray-900">
            <?php } else if($value['status'] === 'checking') { ?>
              <div class="text-sm text-center bg-amber-500 p-2 text-white rounded-full uppercase text-gray-900">
            <?php } else if($value['status'] === 'paid') { ?>
              <div class="text-sm text-center bg-green-500 p-2 text-white rounded-full uppercase text-gray-900">
            <?php }else{ ?>
              <div class="text-sm text-center bg-slate-500 p-2 text-white rounded-full uppercase text-gray-900">
            <?php } ?>
            <?php echo $value['status'] ?>
            </div>

          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <a href="<?php echo base_url('transaction/'.$value['id']) ?>" class="p-2 rounded-full bg-blue-200 hover:bg-blue-400">Lihat</a>
          </td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<?php } ?>


</div>

<?= $this->endSection() ?>