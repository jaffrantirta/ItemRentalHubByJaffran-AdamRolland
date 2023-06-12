<?= $this->extend('templates/main') ?>

<?= $this->section('content') ?>
<div class="mt-5">
    <div class="p-10">
        <div class="">
            <p class="font-bold text-xl">Kategori</p>
            <div class="flex overflow-scroll my-5 gap-5">
            <?php for($i = 0; $i < 15; $i++) { ?>
                <div class="flex p-5 border-2 rounded-3xl items-center justify-center w-fit px-10">
                    <img class="mr-3" src="https://images.tokopedia.net/img/cache/100-square/iEWsxH/2021/10/5/461aa510-5537-41b7-92d4-684d39c9930e.png"/>
                    <p>Semua Kategori</>
                </div>
            <?php } ?>
            </div>
        </div>


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