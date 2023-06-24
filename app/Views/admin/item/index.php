<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Barang</h2>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('/item/create') ?>" class="btn btn-primary mb-2">Tambah</a>
                    <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Harga per hari</th>
                                    <th>Total barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($items as $key => $value) {?>
                                <tr>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo $value['price_per_day'] ?></td>
                                    <td><?php echo $value['quantity_available'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url('') ?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                        <form class="d-inline" action="<?php echo base_url('') ?>" method="POST" onSubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                   
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
    
<?= $this->endSection() ?>
