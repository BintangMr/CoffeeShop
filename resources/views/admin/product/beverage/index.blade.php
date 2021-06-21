@extends('layouts.admin')

@section('title','Liberica Admin | Beverage')

@section('title.page','BEVERAGE')

@section('page.product.beverage','active')

@section('content')
    <div class="row">
        @include('admin.product.beverage.category.index')

        <div class="col-12">
            <div class="card-box">

                <div class="row col-12 mb-2 px-0">
                    <h4 class="mt-0 header-title col-12 col-md-8 mb-2">Beverage</h4>
                    @include('admin.product.beverage.create')
                </div>

                <table id="table-beverage" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Deskripsi Singkat</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.product.beverage.show')
    @include('admin.product.beverage.edit')
@endsection

@push('css')
    <link href="{{asset("asset/admin/libs/dropify/dropify.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("asset/admin/libs/switchery/switchery.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/responsive.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/buttons.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/select.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{asset("asset/admin/libs/quill/quill.core.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("asset/admin/libs/quill/quill.bubble.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("asset/admin/libs/quill/quill.snow.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script src="{{asset("asset/admin/libs/select2/select2.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/dropify/dropify.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/switchery/switchery.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/dataTables.bootstrap4.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/dataTables.responsive.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/responsive.bootstrap4.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/buttons.bootstrap4.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/buttons.html5.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/buttons.flash.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/buttons.print.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/dataTables.keyTable.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/datatables/dataTables.select.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/pdfmake/pdfmake.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/pdfmake/vfs_fonts.js")}}"></script>
    <script src="{{asset("asset/admin/libs/parsleyjs/parsley.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/parsleyjs/id.js")}}"></script>
    <script src="{{asset("asset/admin/libs/jquery-mask-plugin/jquery.mask.min.js")}}"></script>

    <script src="{{asset("asset/admin/libs/quill/quill.min.js")}}"></script>
    <script>
        function deleteBeverage(id, text = null){
            Swal.fire({
                title: 'Apa anda yakin?',
                text: `Anda akan menghapus beverage ${text} !`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    swalLoading();
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('admin.product.beverage.destroy','') }}/'+id,
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Beverage ${text} berhasil di hapus!`,
                                type: "success",
                            }).then(() => {
                                window.table_beverage.ajax.reload( null, false );
                            })
                        },

                    });
                }
            })
        }
        $(document).ready(function () {
            window.table_beverage = $('#table-beverage').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product.beverage.index') }}",
                order: [[ 2, "asc" ]],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {
                        data: 'image_url',
                        name: 'image_url',
                        orderable: false,
                        searchable: false,
                        render: function (data) {
                            return data ? `<img src="${data}" alt="Gambar-Beverage" class="img-thumbnail">` : null;
                        }
                    },
                    {data: 'name', name: 'name'},
                    {data: 'category_beverage.name', name: 'category_beverage.name'},
                    {data: 'simple_description', name: 'simple_description'},
                    {
                        data: 'status',
                        name: 'status',
                        className : 'mx-auto text-center',
                        render : function (data){
                            return data ? `<span class="badge badge-pill badge-success"> <i class="mdi mdi-play"></i> Tampil<span>` : `<span class="badge badge-pill badge-danger"> <i class="mdi mdi-pause"></i> Tidak Tampil<span>`
                        }
                    },
                    {
                        data: 'original_price',
                        name: 'original_price',
                        render: function(data) {
                            return formatter.format(data)
                        }
                    },
                    {
                        data: 'discount_price',
                        name: 'discount_price',
                        render: function(data) {
                            return formatter.format(data)
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return formatter.format(row.original_price - row.discount_price)
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        width: "20%",
                        render : function (data, type, row) {
                            return `<button class="btn btn-info waves-effect waves-light" onclick="showBeverage('${data}')">
                                        <i class="fa fa-eye mr-1"></i>
                                        <span>Lihat</span>
                                    </button>
                                    <button class="btn btn-warning waves-effect waves-light" onclick="editBeverage('${data}')">
                                        <i class="fa fa-pencil-alt mr-1"></i>
                                        <span>Edit</span>
                                    </button>
                                    <button class="btn btn-danger waves-effect waves-light" onclick="deleteBeverage('${data}','${row.name}')">
                                        <i class="fa fa-trash mr-1"></i>
                                        <span>Hapus</span>
                                    </button>`
                        }
                    },
                ]
            });

            $('[data-toggle="input-mask"]').each(function (e, t) {
                var a = $(t).data("maskFormat"), n = $(t).data("reverse");
                null != n ? $(t).mask(a, {reverse: n}) : $(t).mask(a)
            })
        })
    </script>
@endpush
