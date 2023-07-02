<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?= base_url('report/transaction') ?>" method="post">
                        <div class="d-flex">
                            <div>
                                <label for="">Tanggal awal</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="ml-3">
                            <label for="">Tanggal akhir</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            
                        </div>
                        <div class="mt-2">
                                <button class="btn btn-primary"><i class="fa fa-file-pdf"></i> &nbsp; Download Transaksi</button>
                            </div>
                    </form>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-header">
                    <h2>Report</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>transaction</th>
                                    <th>rental</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
</section>
    
<?= $this->endSection() ?>
