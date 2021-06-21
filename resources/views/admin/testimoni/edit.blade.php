<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true"
     id="modalUpdate"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Testimoni </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formUpdate" data-parsley-validate novalidate>
                    <input id="inputUpdateId" class="d-none">
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama</label>
                            <input class="form-control" type="text" id="inputUpdateName" required
                                   placeholder="Nama "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Pekerjaan</label>
                            <input class="form-control" type="text" id="inputUpdateJob" required
                                   placeholder="Nama "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi</label>
                            <textarea class="form-control" type="text" id="inputUpdateDescription" required
                                      placeholder="Deskripsi" rows="9"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                    </div>
                    <div class="col-12 row">
                        <div class="col-md-8 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputUpdateStatus"/>
                            </div>
                        </div>
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
            inputNama: $('#inputUpdateName'),
            inputPekerjaan: $('#inputUpdateJob'),
            inputDescription: $('#inputUpdateDescription'),
            inputStatus: $('#inputUpdateStatus'),

            //INIT
            inputSwitch: new Switchery($('#inputUpdateStatus')[0], $('#inputUpdateStatus').data()),
            formValid: $('#formUpdate').parsley(),

        }

        function editTestimoni(id) {
            swalLoading();

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.testimoni.show','') }}/' + id,
                success: function (data) {
                    cEdit.inputId.val(data.data.id)
                    cEdit.inputNama.val(data.data.name)
                    cEdit.inputDescription.val(data.data.description)
                    cEdit.inputPekerjaan.val(data.data.job)
                    data.data.status ? cEdit.inputSwitch.makeChecked() : cEdit.inputSwitch.makeUnchecked()
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
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let fd = new FormData();
                        let state = false

                        if (cEdit.inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('status', state)
                        fd.append('nama', cEdit.inputNama.val())
                        fd.append('deskripsi', cEdit.inputDescription.val())
                        fd.append('pekerjaan', cEdit.inputPekerjaan.val())
                        fd.append('_method', 'PUT')
                        fd.append('id', cEdit.inputId.val())

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.testimoni.update','') }}/' + cEdit.inputId.val(),
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
                                    window.table_testimoni.ajax.reload(null, false);
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
