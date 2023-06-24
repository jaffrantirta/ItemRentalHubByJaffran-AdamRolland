<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Kategori</h2>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('/itemcategory/create') ?>" class="btn btn-primary mb-2">Tambah</a>
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
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($itemcategory as $item) : ?>
                                        <tr>
                                            <td><?= $item['name'] ?></td>
                                            <td>
                                                <a href="<?= base_url('itemcategory/edit/' . $item['id']) ?>" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <form class="d-inline" id="deleteForm" action="<?= base_url('itemcategory/delete/' . $item['id']) ?>" method="POST" onsubmit="return confirmDelete();">
                                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmDelete() {
        if (confirm('Apakah anda yakin akan menghapus data ini?')) {
            document.getElementById('deleteForm').submit();
        } else {
            return false;
        }
    }
</script>

<?= $this->endSection() ?>
