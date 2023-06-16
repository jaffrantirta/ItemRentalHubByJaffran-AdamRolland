<?= $this->extend('templates/admin') ?>

<?= $this->section('content') ?>
<section>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Create Item</h2>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('/item/store') ?>" method="POST" enctype="multipart/form-data">
                    <?= @csrf_field(); ?>
                        <div class="form-group">
                            <label class="small mb-1">Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="category" id="">
                                <?php foreach($itemcategory as $item){?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Name <span class="text-danger">*</span></label>
                            <input class="form-control" name="name" type="text" placeholder="Name" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">price per day <span class="text-danger">*</span></label>
                            <input class="form-control" name="price" type="number" placeholder="Price Per Day" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Quantity <span class="text-danger">*</span></label>
                            <input class="form-control" name="qty" type="number" placeholder="Quantity" value="" require/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Image <span class="text-danger">*</span></label>
                            <input class="form-control" name="iamge" type="file" id="image-input" placeholder="" value="" require/>
                            <div id="image-preview" class="mt-2"></div>
                        </div>
                        <div class="form-group">
                        <label class="small mb-1">Description</label>
                          
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
