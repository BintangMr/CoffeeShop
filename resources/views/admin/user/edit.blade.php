<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true"
     id="modalUpdate"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit User </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formUpdate" data-parsley-validate novalidate>
                    <input id="inputUpdateId" class="d-none">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama</label>
                            <input class="form-control" type="text" id="inputUpdateNama" required
                                   placeholder="Nama "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" id="inputUpdateEmail" required
                                   placeholder="Email "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Password *isi jika ingin mengubah password</label>
                            <input class="form-control" type="password" id="inputUpdatePassword"
                                   placeholder="Password" rows="9"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Konfirmasi Password (jika password di isi)</label>
                            <input class="form-control" type="password" id="inputUpdateKonfirmasiPassword"
                                   placeholder="Ketik ulang password "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                    </div>
                    <div class="col-12 row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-info btn-block" type="button" id="submitUpdate">Perbarui</button>
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
        let cEdit = {
            btn: $('#btnUpdate'),
            modal: $('#modalUpdate'),
            form: $('#formUpdate'),
            submit: $('#submitUpdate'),
            inputId: $('#inputUpdateId'),
            inputNama: $('#inputUpdateNama'),
            inputEmail: $('#inputUpdateEmail'),
            inputPassword: $('#inputUpdatePassword'),
            inputKonfirmasiPassword: $('#inputUpdateKonfirmasiPassword'),

            //INIT
            formValid: $('#formUpdate').parsley(),

        }

        function editUser(id) {
            swalLoading();

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.user.show','') }}/' + id,
                success: function (data) {
                    cEdit.inputId.val(data.data.id)
                    cEdit.inputNama.val(data.data.name)
                    cEdit.inputEmail.val(data.data.email)
                    cEdit.modal.modal('show')
                    Swal.close();
                },
            });
        }

        $(document).ready(function () {
            cEdit.modal.on("hidden.bs.modal", function () {
                cEdit.form.trigger('reset')
                cEdit.formValid.reset()
            });

            cEdit.submit.click(function () {
                    if (cEdit.formValid.validate()) {
                        let condition = 1;
                        if (cEdit.inputPassword.val()) {
                            if (cEdit.inputPassword.val() !== cEdit.inputKonfirmasiPassword.val()) {
                                condition = 2

                                if(!cEdit.inputKonfirmasiPassword.val()){
                                    condition = 3
                                }
                            }
                        }

                        if (condition == 1) {

                            swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                            let fd = new FormData();

                            fd.append('nama', cEdit.inputNama.val())
                            fd.append('email', cEdit.inputEmail.val())
                            fd.append('password', cEdit.inputPassword.val())
                            fd.append('_method', 'PUT')
                            fd.append('id', cEdit.inputId.val())

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('admin.user.update','') }}/' + cEdit.inputId.val(),
                                contentType: false,
                                processData: false,
                                data: fd,
                                success: function (data) {
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: `Data berhasil di perbarui!`,
                                        type: "success",
                                    }).then(() => {
                                        cEdit.modal.modal('hide')
                                        window.table_user.ajax.reload(null, false);
                                    })
                                },

                            });
                        }else if(condition == 2){
                            swalError('Kesalahan', 'Konfirmasi password tidak sesuai dengan password')
                        }else{
                            swalError('Kesalahan', 'Konfirmasi password harus di isi')
                        }
                    }
                }
            )

        });
    </script>

@endsection
