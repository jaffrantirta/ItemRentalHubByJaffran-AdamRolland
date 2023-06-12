<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="p-10">
<div class="mt-5 grid md:grid-cols-3 grid-cols-1 gap-5 p-5">
    <div>
    <img class="rounded-3xl" src="<?php echo $item['image'] === null ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png' : $item['image'] ?>"/>
    </div>
    <div>
        <p class="font-bold text-3xl"><?php echo $item['name'] ?></p>
        <p class="text-4xl">Rp<?php echo number_format($item['price_per_day']) ?>/hari</p>
        <p class="mt-5 font-bold">Kategori</p>
        <p><?php echo $item['category_name'] ?></p>
        <p class="mt-5 font-bold">Deskripsi</p>
        <p><?php echo $item['description'] ?></p>
    </div>
    <div>
        <form action="/cart" method="post">
            <p>Barang tersedia: <span class="font-bold"><?php echo $item['quantity_available'] ?></span>
            <div class="grid grid-cols-3 gap-5 mt-5">
            <input name="item_id" value="<?php echo $item['id'] ?>" hidden/>
            <div>
                <label>Tanggal ambil</label>
            <input name="start_date" type="date" class="border-2 rounded-lg text-center"/>
            </div>
            <div>
                <label>Tanggal kembali</label>
            <input name="end_date" type="date" class="border-2 rounded-lg text-center"/>
            </div>
            <div class="">
                <label>Jumlah</label>
            <input name="qty" class="border-2 w-full rounded-lg text-center" value="1" type="number"/>
            </div>
            </div>
            <button class="p-1 w-full bg-blue-300 rounded-lg text-white hover:bg-blue-200 mt-5 transaction-all duration-500">Tambah</button>
        </form>
    </div>
</div>

<hr>

<div class="mt-10">
<p class="font-bold text-xl">Barang lainnya</p>
<div class="grid md:flex md:flex-wrap gap-5 justify-center">
<?php foreach ($items as $item) { ?>
            <a href="<?php echo base_url('item/'.$item['id']); ?>" class="border-2 rounded-3xl md:w-1/4">
                <img class="rounded-3xl" src="<?php echo $item['image'] === null ? 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Image_not_available.png/640px-Image_not_available.png' : $item['image'] ?>"/>
                <div class="p-5">
                    <p class="font-bold"><?php echo $item['name'] ?></p>
                    <p class="text-xl">Rp<?php echo number_format($item['price_per_day']) ?>/hari</p>
                </div>
            </a>
            <?php } ?>
        </div>
</div>
        </div>

<?= $this->endSection() ?>