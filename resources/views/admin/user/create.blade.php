<div class="col-12 col-md-4 text-md-right mb-2">
    <button class="mt-0 btn btn-info waves-effect waves-light btn-block" id="btnAdd">
        <i class="fa fa-plus mr-1"></i> <span>  Tambah Admin </span>
    </button>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true"
     id="modalAdd"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Admin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formAdd" data-parsley-validate novalidate>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama</label>
                            <input class="form-control" type="text" id="inputAddNama" required
                                   placeholder="Nama "
                                   parsley-trigger="change" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="inputAddEmail" required
                                   placeholder="Email "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Password</label>
                            <input class="form-control" type="password" id="inputAddPassword" required
                                   placeholder="Password "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Konfirmasi Password</label>
                            <input class="form-control" type="password" id="inputAddKonfirmasiPassword" required
                                   placeholder="Password "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                    </div>
                    <div class="col-12 row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-info btn-block" type="button" id="submitAdd">Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('js')
    @parent

    <script>
        $(document).ready(function () {
            let btn = $('#btnAdd')
            let modal = $('#modalAdd')
            let form = $('#formAdd')
            let submit = $('#submitAdd')
            let inputNama = $('#inputAddNama')
            let inputEmail = $('#inputAddEmail')
            let inputPassword = $('#inputAddPassword')
            let inputKonfirmasiPassword = $('#inputAddKonfirmasiPassword')

            //INIT
            let formValid = form.parsley()
            //-------------

            //Mount
            btn.click(function () {
                modal.modal('show')
            })

            modal.on("hidden.bs.modal", function () {
                form.trigger('reset')
                formValid.reset()
            });

            submit.click(function () {
                    if (formValid.validate()) {
                        if(inputPassword.val() === inputKonfirmasiPassword.val()) {

                            swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                            let fd = new FormData();

                            fd.append('nama', inputNama.val())
                            fd.append('email', inputEmail.val())
                            fd.append('password', inputPassword.val())

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('admin.user.store') }}',
                                contentType: false,
                                processData: false,
                                data: fd,
                                success: function (data) {
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: `Data berhasil di tambahkan!`,
                                        type: "success",
                                    }).then(() => {
                                        modal.modal('hide')
                                        window.table_user.ajax.reload(null, false);
                                    })
                                },

                            });
                        }else{
                            swalError('Kesalahan', 'Konfirmasi password tidak sesuai dengan password')
                        }

                    }
                }
            )

        });
    </script>

@endsection
