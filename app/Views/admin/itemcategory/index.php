<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Category Item</h2>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('/itemcategory/create') ?>" class="btn btn-primary mb-2">add</a>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>created</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($itemcategory as $item){
                                    ?>
                                    <tr>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <a href="#"class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                            <form class="d-inline" action="#" method="POST" onSubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                    

                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
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
