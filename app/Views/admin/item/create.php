<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Barang</h2>
                </div>
                <div class="card-body">
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
                        <?php if (session()->getFlashdata('errors')) : ?>
                            <div class="alert alert-danger">
                            <?php foreach (session()->getFlashdata('errors') as $key => $value) {
                                echo $value.' ';
                            } ?>
                            </div>
                        <?php endif; ?>
                    <form action="<?= base_url('/item/store') ?>" method="POST" enctype="multipart/form-data">
                    <?= @csrf_field(); ?>
                        <div class="form-group">
                            <label class="small mb-1">Kategori<span class="text-danger">*</span></label>
                            <select class="form-control" name="id_category" id="">
                                <?php foreach($itemcategory as $item){?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Nama barang <span class="text-danger">*</span></label>
                            <input class="form-control" name="name" type="text" placeholder="Nama" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Harga sewa per hari <span class="text-danger">*</span></label>
                            <input class="form-control" name="price_per_day" type="number" placeholder="Harga" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Total barang tersedia <span class="text-danger">*</span></label>
                            <input class="form-control" name="quantity_available" type="number" placeholder="Total barang" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Gambar <span class="text-danger">*</span></label>
                            <input class="form-control" name="image" type="file" id="image-input" placeholder="" require/>
                            <div id="image-preview" class="mt-2"></div>
                        </div>
                        <div class="form-group">
                        <label class="small mb-1">Deskripsi</label>
                          
                        <textarea name="description" id="editor1"></textarea>
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
<script>
    CKEDITOR.replace('editor1');

    const imageInput = document.getElementById('image-input');
const imagePreview = document.getElementById('image-preview');

imageInput.addEventListener('change', function (e) {
  const file = e.target.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener('load', function () {
      const imageUrl = reader.result;
      const imageElement = document.createElement('img');
      imageElement.style.width = '200px'; // Set lebar gambar
      imageElement.style.height = '200px'; // Set tinggi gambar

      imageElement.src = imageUrl;
      
      imagePreview.innerHTML = '';
      imagePreview.appendChild(imageElement);
    });

    reader.readAsDataURL(file);
  }
});

</script>
<?= $this->endSection() ?>
