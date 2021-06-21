<div class="col-12 col-md-4 text-md-right mb-2">
    <button class="mt-0 btn btn-info waves-effect waves-light btn-block" id="btnAdd">
        <i class="fa fa-plus mr-1"></i> <span>  Tambah Promo </span>
    </button>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true"
     id="modalAdd"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Promo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formAdd" data-parsley-validate novalidate>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Judul</label>
                            <input class="form-control" type="text" id="inputAddTitle" required
                                   placeholder="Nama "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi</label>
                            <textarea class="form-control" type="text" id="inputAddDescription" required
                                      placeholder="Deskripsi Singkat" rows="9"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <input type="file" class="dropify" required data-max-file-size="2M"
                                   id="inputAddGambar" data-allowed-file-extensions='["jpeg", "jpg","png"]'/>
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputAddStatus"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
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
            let inputTitle = $('#inputAddTitle')
            let inputDescription = $('#inputAddDescription')
            let inputGambar = $('#inputAddGambar')
            let inputStatus = $('#inputAddStatus')

            //INIT
            let inputSwitch = new Switchery(inputStatus[0], inputStatus.data());
            let formValid = form.parsley()
            let dropGambar = inputGambar.dropify(window.dropifyConfig);
            dropGambar = dropGambar.data('dropify');
            //-------------

            //Mount
            btn.click(function () {
                modal.modal('show')
            })

            modal.on("hidden.bs.modal", function () {
                form.trigger('reset')
                formValid.reset()
                dropGambar.resetPreview()
                dropGambar.clearElement()
            });

            submit.click(function () {
                    if (formValid.validate()) {
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let gambar = inputGambar[0].files;
                        let fd = new FormData();
                        let state = false

                        if (gambar.length > 0) {
                            fd.append('gambar', gambar[0])
                        }
                        if (inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('status', state)
                        fd.append('judul', inputTitle.val())
                        fd.append('deskripsi', inputDescription.val())

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.promo.store') }}',
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
                                    window.table_promo.ajax.reload( null, false );
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
