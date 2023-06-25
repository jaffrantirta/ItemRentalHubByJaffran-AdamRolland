<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Detail Transaksi</h2>
                </div>
                <div class="card-body">
                    <p>Kode transaksi : <?= $transaction['reference_code'] ?></p>
                    <p>Tanggal : <?= $transaction['created_at'] ?></p>
                    <p>Status : <?= $transaction['status'] ?></p>
                    <p>Bukti pembayaran : <img class=""col-lg-6 src="<?= base_url('uploads/'.$transaction['receipt']) ?>"/></p>
                    <div class="m-2">
                        <?php if ($transaction['status'] === 'unpaid'): ?>
                            <form action="<?= base_url('action') ?>" method="post">
                                <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
                                <input type="hidden" name="action" value="reject">
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        <?php elseif ($transaction['status'] === 'checking'): ?>
                            <form action="<?= base_url('action') ?>" method="post">
                                <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
                                <input type="hidden" name="action" value="confirm">
                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                            </form>
                            <form action="<?= base_url('action') ?>" method="post">
                                <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
                                <input type="hidden" name="action" value="reject">
                                <button type="submit" class="btn btn-danger">Tolak</button>
                            </form>
                        <?php elseif ($transaction['status'] === 'confirm'): ?>
                            <form action="<?= base_url('action') ?>" method="post">
                                <input type="hidden" name="transaction_id" value="<?= $transaction['id'] ?>">
                                <input type="hidden" name="action" value="return">
                                <button type="submit" class="btn btn-primary">Telah Dikembalikan</button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama barang</th>
                                    <th>Harga sewa per hari</th>
                                    <th>Jumalah barang</th>
                                    <th>Tanggal ambil</th>
                                    <th>Tanggal kembali</th>
                                    <th>Jumalah hari pinjam</th>
                                    <th>Total harga</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($transaction_details as $key => $value) { ?>
                                <?php $date1 = new DateTime($value['start_date']); // Replace with your first date
                                    $date2 = new DateTime($value['end_date']); // Replace with your second date

                                    $interval = $date1->diff($date2);

                                    $diffInDays = $interval->days;
 ?>
                                <tr>
                                    <td><?= $value['name'] ?></td>
                                    <td>Rp<?= number_format($value['price']) ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td><?= $value['start_date'] ?></td>
                                    <td><?= $value['end_date'] ?></td>
                                    <td><?= $diffInDays ?></td>
                                    <td>Rp<?= number_format($value['total']) ?></td>
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
