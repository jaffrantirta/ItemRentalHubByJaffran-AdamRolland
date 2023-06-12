<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="p-10">
<div class="mt-5 grid md:grid-cols-3 grid-cols-1 gap-5 p-5">
    <div>
    <img class="rounded-3xl" src="https://www.ruparupa.com/blog/wp-content/uploads/2022/03/white-wall-living-room-have-sofa-decoration-3d-rendering.jpg"/>
    </div>
    <div>
        <p class="font-bold text-3xl">Bagus ini</p>
        <p class="text-4xl">Rp100.000/day</p>
        <p class="mt-5 font-bold">Kategori</p>
        <p>Lighting</p>
        <p class="mt-5 font-bold">Deskripsi</p>
        <p>Consequat irure nostrud magna tempor laborum enim reprehenderit Lorem quis nostrud eiusmod officia. Aute exercitation cillum laborum minim ullamco pariatur veniam nostrud ea et est laboris labore irure. Enim nisi adipisicing ullamco eu consectetur qui culpa consequat qui minim ad. Velit duis amet non et voluptate culpa. Aute Lorem cupidatat incididunt nulla culpa nisi officia anim fugiat occaecat nisi aute excepteur sit. Id officia adipisicing ad nostrud reprehenderit cillum elit ipsum. Adipisicing elit nisi ut irure culpa excepteur proident dolor adipisicing sint reprehenderit commodo.</p>
    </div>
    <div>
        <p>Barang tersedia: <span class="font-bold">4</span>
        <div class="grid grid-cols-3 gap-5 mt-5">
            <button class="p-1 w-full bg-blue-300 rounded-lg text-white hover:bg-blue-200 transaction-all duration-500">+</button>
            <input class="border-2 rounded-lg text-center" value="1"/>
            <button class="p-1 w-full bg-blue-300 rounded-lg text-white hover:bg-blue-200 transaction-all duration-500">-</button>
        </div>
        <button class="p-1 w-full bg-blue-300 rounded-lg text-white hover:bg-blue-200 mt-5 transaction-all duration-500">Tambah</button>
    </div>
</div>

<hr>

<div class="mt-10">
<p class="font-bold text-xl">Barang lainnya</p>
<div class="grid md:flex md:flex-wrap gap-5 justify-center">
        <?php for($i = 0; $i < 10; $i++) { ?>
            <div class="border-2 rounded-3xl md:w-1/4">
                <img class="rounded-3xl" src="https://www.ruparupa.com/blog/wp-content/uploads/2022/03/white-wall-living-room-have-sofa-decoration-3d-rendering.jpg"/>
                <div class="p-5">
                    <p class="font-bold">Rinso anti noda</p>
                    <p class="text-xl">Rp100.000/day</p>
                </div>
            </div>
            <?php } ?>
        </div>
</div>
        </div>

<?= $this->endSection() ?>