<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true"
     id="modalUpdate"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Promo </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formUpdate" data-parsley-validate novalidate>
                    <input id="inputUpdateId" class="d-none">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Judul</label>
                            <input class="form-control" type="text" id="inputUpdateTitle" required
                                   placeholder="Nama "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi</label>
                            <textarea class="form-control" type="text" id="inputUpdateDescription" required
                                      placeholder="Deskripsi Singkat" rows="9"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <input type="file" class="dropify" required data-max-file-size="2M"
                                   id="inputUpdateGambar" data-allowed-file-extensions='["jpeg", "jpg","png"]'/>
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputUpdateStatus"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
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
            inputTitle: $('#inputUpdateTitle'),
            inputDescription: $('#inputUpdateDescription'),
            inputGambar: $('#inputUpdateGambar'),
            inputStatus: $('#inputUpdateStatus'),

            //INIT
            inputSwitch: new Switchery($('#inputUpdateStatus')[0], $('#inputUpdateStatus').data()),
            formValid: $('#formUpdate').parsley(),
            dropGambar: $('#inputUpdateGambar').dropify(window.dropifyConfig),

            quillinputDeskripsiLengkap: new Quill('#inputUpdateLongDescription', {
                theme: "snow",
                modules: window.textEditorConfig
            })
        }
        cEdit.dropGambar = cEdit.dropGambar.data('dropify');

        function editPromo(id) {
            swalLoading();

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.promo.show','') }}/' + id,
                success: function (data) {
                    cEdit.inputId.val(data.data.id)
                    cEdit.inputTitle.val(data.data.title)
                    cEdit.inputDescription.val(data.data.description)
                    cEdit.dropGambar.resetPreview()
                    cEdit.dropGambar.clearElement()
                    cEdit.dropGambar.settings.defaultFile = data.data.image ? data.data.image.image_url : ''
                    cEdit.dropGambar.file.name = data.data.image ? data.data.image.original_filename : ''
                    cEdit.dropGambar.destroy()
                    cEdit.dropGambar.init()
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
                cEdit.dropGambar.resetPreview();
                cEdit.dropGambar.clearElement();
            });

            cEdit.submit.click(function () {
                    if (cEdit.dropGambar.settings.defaultFile != '') {
                        cEdit.form.parsley().destroy();
                        cEdit.inputGambar.attr('required', false).prop('required',false);
                        cEdit.formValid = cEdit.form.parsley();
                        cEdit.dropGambar.destroy()
                        cEdit.dropGambar.init()
                    }
                    if (cEdit.formValid.validate()) {
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let gambar = cEdit.inputGambar[0].files;
                        let fd = new FormData();
                        let state = false

                        if (gambar.length > 0) {
                            fd.append('gambar', gambar[0])
                        }
                        if (cEdit.inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('status', state)
                        fd.append('judul', cEdit.inputTitle.val())
                        fd.append('deskripsi', cEdit.inputDescription.val())
                        fd.append('_method', 'PUT')
                        fd.append('id', cEdit.inputId.val())

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.promo.update','') }}/' + cEdit.inputId.val(),
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
                                    window.table_promo.ajax.reload(null, false);
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
