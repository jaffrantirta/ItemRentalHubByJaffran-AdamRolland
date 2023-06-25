<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Pesanan</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode transaksi</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                    <th>Tanggal pesan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transactions as $key => $value) { ?>
                                <tr>
                                    <td><?= $value['reference_code'] ?></td>
                                    <td><?= $value['grand_total'] ?></td>
                                    <td class="text-uppercase 
                                        <?php
                                        if ($value['status'] === 'unpaid') {
                                            echo 'bg-warning';
                                        } elseif ($value['status'] === 'rejected') {
                                            echo 'bg-danger';
                                        } elseif ($value['status'] === 'confirm') {
                                            echo 'bg-success';
                                        } elseif ($value['status'] === 'checking') {
                                            echo 'bg-info';
                                        }
                                        ?>
                                        ">
                                        <?= $value['status'] ?>
                                    </td>
                                    <td><?= $value['created_at'] ?></td>
                                    <td><a href="<?= base_url('rentaldetail/'.$value['id']) ?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a></td>
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
