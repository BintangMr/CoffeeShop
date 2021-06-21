<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createSerbuk" aria-hidden="true"
     id="modalUpdateSerbuk"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Serbuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formUpdateSerbuk" data-parsley-validate novalidate>
                    <input id="inputUpdateIdSerbuk" class="d-none">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama Serbuk</label>
                            <input class="form-control" type="text" id="inputUpdateNamaSerbuk" required
                                   placeholder="Nama Serbuk"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputUpdateSimpleDescriptionSerbuk"
                                      required
                                      placeholder="Deskripsi Singkat"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Harga</label>
                                <input type="text" class="form-control" data-toggle="input-mask"
                                       id="inputUpdateHargaSerbuk"
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Diskon</label>
                                <input type="text" class="form-control" data-toggle="input-mask" placeholder=""
                                       id="inputUpdateDiskonSerbuk" readonly
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Harga Setelah Diskon</label>
                            <input type="text" class="form-control" disabled data-toggle="input-mask"
                                   id="inputUpdateHargaSetelahDiskonSerbuk"
                                   data-mask-format="000.000.000.000.000,00" data-reverse="true">
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Kategori</label>
                            <select class="form-control" type="text" id="selectUpdateSerbukCategory" required
                                    parsley-trigger="change" autocomplete="off"></select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <input type="file" class="dropify" required data-max-file-size="2M" data-default-file=""
                                   id="inputUpdateGambarSerbuk" data-allowed-file-extensions='["jpeg", "jpg","png"]'/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Lengkap</label>
                            <div id="inputUpdateLongDescriptionSerbuk" style="height: 300px;">
                                <h3><span class="ql-size-large">Deskripsi!</span></h3>
                            </div> <!-- end Snow-editor-->
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputUpdateStatusSerbuk"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-info btn-block" type="button" id="submitUpdateSerbuk">Perbarui
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
        let cEditSerbuk = {
            btn: $('#btnUpdateSerbuk'),
            modal: $('#modalUpdateSerbuk'),
            form: $('#formUpdateSerbuk'),
            submit: $('#submitUpdateSerbuk'),
            inputId: $('#inputUpdateIdSerbuk'),
            inputNama: $('#inputUpdateNamaSerbuk'),
            inputDeskripsiSingkat: $('#inputUpdateSimpleDescriptionSerbuk'),
            inputDeskripsiLengkap: $('#inputUpdateLongDescriptionSerbuk'),
            selectCategory: $('#selectUpdateSerbukCategory'),
            inputGambar: $('#inputUpdateGambarSerbuk'),
            inputStatus: $('#inputUpdateStatusSerbuk'),
            inputHarga: $('#inputUpdateHargaSerbuk'),
            inputDiskon: $('#inputUpdateDiskonSerbuk'),
            inputHargaSetelahDiskon: $('#inputUpdateHargaSetelahDiskonSerbuk'),

            //INIT
            inputSwitch: new Switchery($('#inputUpdateStatusSerbuk')[0], $('#inputUpdateStatusSerbuk').data()),
            select2Category: $('#selectUpdateSerbukCategory').select2({
                placeholder: "Pilih Kategori"
            }),
            formValid: $('#formUpdateSerbuk').parsley(),
            dropGambar: $('#inputUpdateGambarSerbuk').dropify(window.dropifyConfig),

            quillinputDeskripsiLengkap: new Quill('#inputUpdateLongDescriptionSerbuk', {
                theme: "snow",
                modules: window.textEditorConfig
            })
        }
        cEditSerbuk.dropGambar = cEditSerbuk.dropGambar.data('dropify');

        function editSerbuk(id) {
            swalLoading();

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.product.serbuk.show','') }}/' + id,
                success: function (data) {
                    cEditSerbuk.inputId.val(data.data.id)
                    cEditSerbuk.inputNama.val(data.data.name)
                    cEditSerbuk.inputDeskripsiSingkat.val(data.data.simple_description)
                    cEditSerbuk.inputDeskripsiLengkap.empty().append(data.data.long_description)
                    cEditSerbuk.selectCategory.val(data.data.category_serbuk.name)
                    cEditSerbuk.inputHarga.val(data.data.original_price).trigger('input').trigger('keyup')
                    cEditSerbuk.inputDiskon.val(data.data.discount_price).trigger('input').trigger('keyup')
                    cEditSerbuk.dropGambar.resetPreview()
                    cEditSerbuk.dropGambar.clearElement()
                    cEditSerbuk.dropGambar.settings.defaultFile = data.data.image_serbuk ? data.data.image_serbuk.image_url : ''
                    cEditSerbuk.dropGambar.file.name = data.data.image_serbuk ? data.data.image_serbuk.original_filename : ''
                    cEditSerbuk.dropGambar.destroy()
                    cEditSerbuk.dropGambar.init()
                    data.data.status ? cEditSerbuk.inputSwitch.makeChecked() : cEditSerbuk.inputSwitch.makeUnchecked()
                    cEditSerbuk.selectCategory.empty().prop('disabled', true).select2({
                        placeholder: "Loading...",
                    });
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('admin.product.serbuk.category.index') }}?array=true',
                        success: function (categoryData) {
                            Swal.close()
                            $.each(categoryData.data, function (index, value) {
                                cEditSerbuk.selectCategory.append(`<option data-id="${value.id}" value="${value.id}">${value.name}</option>`)
                            });
                            cEditSerbuk.selectCategory.val(data.data.category_serbuk.id).prop('disabled', false).select2({
                                placeholder: "Pilih Kategori",
                            });
                        },
                    });
                    cEditSerbuk.modal.modal('show')
                },
            });
        }

        $(document).ready(function () {
            cEditSerbuk.modal.on("hidden.bs.modal", function () {
                cEditSerbuk.form.trigger('reset')
                cEditSerbuk.inputDiskon.prop('readonly', true)
                cEditSerbuk.formValid.reset()
                cEditSerbuk.dropGambar.resetPreview();
                cEditSerbuk.dropGambar.clearElement();
            });
            cEditSerbuk.inputHarga.keyup(function () {
                let value = parseFloat($(this).val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                if (value > 0) {
                    cEditSerbuk.inputDiskon.prop('readonly', false)
                } else {
                    cEditSerbuk.inputDiskon.prop('readonly', true).val(null)
                }

                calculate()
            });

            cEditSerbuk.inputDiskon.keyup(function () {
                let value = parseFloat($(this).val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                if (value > 0) {
                    cEditSerbuk.inputDiskon.prop('readonly', false)
                }
                calculate()
            });

            function calculate() {
                let harga = parseFloat(cEditSerbuk.inputHarga.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                let diskon = parseFloat(cEditSerbuk.inputDiskon.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                let total = null

                if (!isNaN(harga) && !isNaN(diskon)) {
                    total = harga - diskon
                } else if (!isNaN(harga)) {
                    total = harga
                }
                cEditSerbuk.inputHargaSetelahDiskon.val(parseFloat(total).toFixed(2)).trigger('input')
            }

            cEditSerbuk.submit.click(function () {
                    if (cEditSerbuk.dropGambar.settings.defaultFile != '') {
                        cEditSerbuk.form.parsley().destroy();
                        cEditSerbuk.inputGambar.attr('required', false).prop('required',false);
                        cEditSerbuk.formValid = cEditSerbuk.form.parsley();
                        cEditSerbuk.dropGambar.destroy()
                        cEditSerbuk.dropGambar.init()
                    }
                    if (cEditSerbuk.formValid.validate()) {
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let gambar = cEditSerbuk.inputGambar[0].files;
                        let fd = new FormData();
                        let state = false
                        let diskon = parseFloat(cEditSerbuk.inputDiskon.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                        let harga = parseFloat(cEditSerbuk.inputHarga.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                        if (gambar.length > 0) {
                            fd.append('gambar', gambar[0])
                        }
                        if (cEditSerbuk.inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('_method', 'PUT')
                        fd.append('id', cEditSerbuk.inputId.val())
                        fd.append('kategori', cEditSerbuk.selectCategory.val())
                        fd.append('harga', isNaN(harga) ? '' : harga)
                        fd.append('diskon', isNaN(diskon) ? '' : diskon)
                        fd.append('status', state)
                        fd.append('nama', cEditSerbuk.inputNama.val())
                        fd.append('deskripsi_singkat', cEditSerbuk.inputDeskripsiSingkat.val())
                        fd.append('deskripsi_lengkap', cEditSerbuk.quillinputDeskripsiLengkap.root.innerHTML)

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.product.serbuk.update','') }}/' + cEditSerbuk.inputId.val(),
                            contentType: false,
                            processData: false,
                            data: fd,
                            success: function (data) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: `Data berhasil di perbarui!`,
                                    type: "success",
                                }).then(() => {
                                    cEditSerbuk.modal.modal('hide')
                                    window.table_serbuk.ajax.reload(null, false);
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
