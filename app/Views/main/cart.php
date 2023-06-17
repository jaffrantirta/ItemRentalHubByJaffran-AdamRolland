<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>

<div class='p-10'>
<table class="min-w-full divide-y divide-gray-200">
  <thead>
    <tr>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        No
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Nama
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Harga
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Tanggal pinjam
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Tanggal kembali
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Jumlah barang
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Total
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    <?php $totalPrice = 0 ?>
    <?php foreach ($cart as $key => $value) {
      $pricePerDay = $value['item']['price_per_day'];
      $startDate = new DateTime($value['start_date']);
      $endDate = new DateTime($value['end_date']);
      $diffInDays = $startDate->diff($endDate)->days;
      $itemCount = $value['qty'];
  
      $subtotal = $pricePerDay * $diffInDays * $itemCount;
      $totalPrice += $subtotal;
       ?>
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $key + 1 ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['item']['name'] ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo number_format($value['item']['price_per_day']) ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['start_date'] ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['end_date'] ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['qty'] ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo number_format($subtotal) ?></div>
          </td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<div class='flex justify-end mt-5 p-10'>
  <p class='text-xl'>Total <span class='font-bold'>Rp<?php echo number_format($totalPrice) ?></span></p>
</div>

<div class="flex justify-center">
  <button class="p-1 bg-blue-300 rounded-lg text-white hover:bg-blue-200 mt-5 transition-all duration-500 w-20">Pesan</button>
</div>


</div>

<?= $this->endSection() ?>