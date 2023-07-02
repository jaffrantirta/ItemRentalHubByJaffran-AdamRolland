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
                                <label for="">start date</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="ml-3">
                            <label for="">end date</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            
                        </div>
                        <div class="mt-2">
                                <button class="btn btn-primary"><i class="fa fa-file-pdf"></i> &nbsp; Download</button>
                            </div>
                    </form>
                </div>
            </div>
            <div class="card">
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
                                <!-- @foreach ($category as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td><a href="{{ route('category.edit',$item->id) }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                    
                                        <form class="d-inline" action="{{route('category.destroy', $item->id)}}" method="POST" onSubmit="return confirm('Apakah anda yakin akan menghapus data ini?');">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                   
                                </tr>
                                @endforeach -->
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
