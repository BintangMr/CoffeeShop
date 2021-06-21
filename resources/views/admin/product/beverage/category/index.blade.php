<div class="col-12">
    <div class="card-box">

        <div class="row col-12 mb-2 px-0">
            <h4 class="mt-0 header-title col-12 col-md-8 mb-2" >Kategori</h4>
            @include('admin.product.beverage.category.create')
        </div>

        <table id="table-beverage-categories" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@include('admin.product.beverage.category.show')
@include('admin.product.beverage.category.edit')

@section('js')
    @parent

    <script>
        function deleteCategory(id, text = null){
            Swal.fire({
                title: 'Apa anda yakin?',
                text: `Anda akan menghapus kategori ${text} !`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    swalLoading();
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('admin.product.beverage.category.destroy','') }}/'+id,
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Kategori ${text} berhasil di hapus!`,
                                type: "success",
                            }).then(() => {
                                window.table_categories.ajax.reload( null, false );
                                window.table_beverage.ajax.reload( null, false );
                            })
                        },

                    });
                }
            })
        }

        $(document).ready(function () {
            window.table_categories = $('#table-beverage-categories').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product.beverage.category.index') }}",
                order: [[ 1, "asc" ]],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {
                        data: 'status',
                        name: 'status',
                        render : function (data) {
                            return data ? `<span class="badge badge-pill badge-success"> <i class="mdi mdi-play"></i> Tampil<span>` : `<span class="badge badge-pill badge-danger"> <i class="mdi mdi-pause"></i> Tidak Tampil<span>`
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        width: "20%",
                        render : function (data, type, row) {
                            return `<button class="btn btn-info waves-effect waves-light" onclick="showCategory('${data}')">
                                        <i class="fa fa-eye mr-1"></i>
                                        <span>Lihat</span>
                                    </button>
                                    <button class="btn btn-warning waves-effect waves-light" onclick="editCategory('${data}')">
                                        <i class="fa fa-pencil-alt mr-1"></i>
                                        <span>Edit</span>
                                    </button>
                                    <button class="btn btn-danger waves-effect waves-light" onclick="deleteCategory('${data}','${row.name}')">
                                        <i class="fa fa-trash mr-1"></i>
                                        <span>Hapus</span>
                                    </button>`
                        }
                    },
                ]
            });
        })
    </script>

@endsection
