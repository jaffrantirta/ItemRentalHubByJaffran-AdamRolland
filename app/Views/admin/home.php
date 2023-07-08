<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row mt-5">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $items ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transactions ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                customer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $customers ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
        <div class="card">
                <div class="card-header">
                    <h2>Pesanan yang perlu dicek</h2>
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
                                <?php foreach ($transactionsNeedChecks as $key => $value) { ?>
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

        <!-- Pie Chart -->
        
    </div>
</div>

<?= $this->endSection() ?>