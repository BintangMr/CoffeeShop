@extends('layouts.admin')

@section('title','Liberica Admin | User')

@section('title.page','User')

@section('page.User','active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="row col-12 mb-2 px-0">
                    <h4 class="mt-0 header-title col-12 col-md-8 mb-2">User</h4>
                    @include('admin.user.create')
                </div>

                <table id="table_user" class="table table-striped table-bordered dt-responsive nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.user.edit')
@endsection

@push('css')
    <link href="{{asset("asset/admin/libs/dropify/dropify.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/switchery/switchery.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/dataTables.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/responsive.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/buttons.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/datatables/select.bootstrap4.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/select2/select2.min.css")}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset("asset/admin/libs/quill/quill.core.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/quill/quill.bubble.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("asset/admin/libs/quill/quill.snow.css")}}" rel="stylesheet" type="text/css"/>
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
        function deleteUser(id, text = null) {
            Swal.fire({
                title: 'Apa anda yakin?',
                text: `Anda akan menghapus user ${text} !`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    swalLoading();
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('admin.user.destroy','') }}/' + id,
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `User ${text} berhasil di hapus!`,
                                type: "success",
                            }).then(() => {
                                window.table_user.ajax.reload(null, false);
                            })
                        },

                    });
                }
            })
        }

        $(document).ready(function () {
            window.table_user = $('#table_user').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user.index') }}",
                order: [[2, "asc"]],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        width: "20%",
                        render: function (data, type, row) {
                            return `<button class="btn btn-warning waves-effect waves-light" onclick="editUser('${data}')">
                                        <i class="fa fa-pencil-alt mr-1"></i>
                                        <span>Edit</span>
                                    </button>
                                    <button class="btn btn-danger waves-effect waves-light" onclick="deleteUser('${data}','${row.nama}')">
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
