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
                    <form action="<?= base_url('/itemcategory/store') ?>" method="POST" enctype="multipart/form-data">
                    <?= @csrf_field(); ?>
                        <div class="form-group">
                            <label class="small mb-1">Name</label>
                            <input class="form-control form-control-solid" name="name" type="text" placeholder="Name" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Email</label>
                            <input class="form-control form-control-solid" name="name" type="text" placeholder="Name" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Phone</label>
                            <input class="form-control form-control-solid" name="name" type="text" placeholder="Name" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Password</label>
                            <input class="form-control form-control-solid" name="name" type="password" placeholder="Name" value="" require/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right" type="submit"><i class="far fa-save mr-1"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
    
<?= $this->endSection() ?>
