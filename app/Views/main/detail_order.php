<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="p-10">

<div class="p-10">
<p class="text-2xl font-bold"><?php echo $transaction['reference_code'] ?></p>
<p class="text-xl italic"><?php echo $transaction['status'] ?></p>
<p class="font-bold">Dipesan pada <?php echo $transaction['created_at'] ?></p>
</div>

<table class="min-w-full divide-y divide-gray-200">
  <thead>
    <tr>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        No.
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Nama Barang
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Harga per hari
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Tanggal pinjam
      </th>
      <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Total
      </th>
    </tr>
  </thead>
  <tbody class="bg-white divide-y divide-gray-200">
    <?php foreach ($transaction_details as $key => $value) { ?>
        <tr>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $key + 1 ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['name'] ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">Rp<?php echo number_format($value['price']) ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900"><?php echo $value['start_date'] ?> - <?php echo $value['end_date'] ?> </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="text-sm text-gray-900">Rp<?php echo number_format($value['total']) ?></div>
          </td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<div class='flex justify-end mt-5 p-10'>
  <p class='text-xl'>Total <span class='font-bold'>Rp<?php echo number_format($transaction['grand_total']) ?></span></p>
</div>

<div>
    <form class="flex gap-5" action="<?php echo base_url('transaction/'.$transaction['id']) ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="file" class="rounded-full p-3 border-2"/>
        <button class="rounded-full bg-slate-400 hover:bg-slate-300 p-5 text-white">Kirim bukti pembayaran</button>
    </form>
    <div class="p-2">
    <p>Transfer pembayaran melalui:</p>
    <p class="font-bold">Bank BCA 7654678767 a.n William</p>
    <p class="text-red-500">Pastikan mengirim nominal sesuai tagihan dan konfirmasi ke admin setelah transfer!</p>
    </div>
</div>
</div>

<?= $this->endSection() ?>