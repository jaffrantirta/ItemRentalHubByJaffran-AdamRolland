<?= $this->extend('templates/auth') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 content-center justify-center">
        <div class="p-10 bg-slate-300 rounded-3xl m-10">
            <div class="flex flex-col mb-10">
                <strong class="text-4xl">Buat akun</strong>
                <small>Daftar terlebih dahulu! Jika telah memiliki akun <a class="text-blue-500 hover:text-blue-300" href="/sigin">klik disini</a></small>
            </div>
            <?php if (isset($validation)) : ?>
                <div class="rounded-full my-3 p-3 text-center bg-amber-400">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url(); ?>/SignupController/store" method="post">
                <div class="flex flex-col mb-5">
                    <label class="font-bold">Nama</label>
                    <input type="text" name="name" placeholder="Masukan nama lengkap" value="<?= set_value('name') ?>" class="p-2 border-2 rounded-full">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col mb-5">
                        <label class="font-bold">Email</label>
                        <input type="text" name="email" placeholder="Masukan email aktif" value="<?= set_value('email') ?>" class="p-2 border-2 rounded-full">
                    </div>
                    <div class="flex flex-col mb-5">
                        <label class="font-bold">Nomor Telepon</label>
                        <input type="text" name="phone" placeholder="Masukan nomor telepon aktif" value="<?= set_value('phone') ?>" class="p-2 border-2 rounded-full">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col mb-5">
                        <label class="font-bold">Password</label>
                        <input type="password" name="password" placeholder="Masukan password" class="p-2 border-2 rounded-full">
                    </div>
                    <div class="flex flex-col mb-5">
                        <label class="font-bold">Konfirmasi password</label>
                        <input type="password" name="confirmpassword" placeholder="Masukan kembali password" class="p-2 border-2 rounded-full">
                    </div>
                </div>
                <button class="rounded-full bg-blue-400 px-16 py-3 w-full shadow-lg hover:bg-blue-300">Daftar!</button>
            </form>
        </div>

        <div class="flex justify-center">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/illustration.svg" />
        </div>
    </div>
</div>

<?= $this->endSection() ?>