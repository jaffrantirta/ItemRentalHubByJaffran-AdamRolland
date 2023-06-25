<?= $this->extend('templates/auth') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="grid grid-cols-1 md:grid-cols-2 content-center justify-center">
        <div class="p-10 bg-slate-300 rounded-3xl m-10">
            <div class="flex flex-col mb-10">
                <strong class="text-4xl">Selamat datang</strong>
                <small>Masuk terlebih dahulu! Jika bekum memiliki akun <a class="text-blue-500 hover:text-blue-300" href="<?= base_url(); ?>/signup">klik disini</a></small>
            </div>
            <?php if (isset($validation)) : ?>
                <div class="rounded-full my-3 p-3 text-center bg-amber-400">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url(); ?>/SigninController/loginAuth" method="post">
                <div class="flex flex-col mb-5">
                    <label class="font-bold">Email</label>
                    <input type="text" name="email" placeholder="Masukan email terdaftar" value="<?= set_value('email') ?>" class="p-2 border-2 rounded-full">
                </div>

                <div class="flex flex-col mb-5">
                    <label class="font-bold">Password</label>
                    <input type="password" name="password" placeholder="Masukan password" class="p-2 border-2 rounded-full">
                </div>

                <button class="rounded-full bg-blue-400 px-16 py-3 w-full shadow-lg hover:bg-blue-300">Masuk!</button>
            </form>
        </div>

        <div class="flex justify-center">
            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/authentication/illustration.svg" />
        </div>
    </div>
</div>

<?= $this->endSection() ?>