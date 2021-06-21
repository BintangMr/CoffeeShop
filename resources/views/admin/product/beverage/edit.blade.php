<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createBeverage" aria-hidden="true"
     id="modalUpdateBeverage"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Beverage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formUpdateBeverage" data-parsley-validate novalidate>
                    <input id="inputUpdateIdBeverage" class="d-none">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama Beverage</label>
                            <input class="form-control" type="text" id="inputUpdateNamaBeverage" required
                                   placeholder="Nama Beverage"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputUpdateSimpleDescriptionBeverage"
                                      required
                                      placeholder="Deskripsi Singkat"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Harga</label>
                                <input type="text" class="form-control" data-toggle="input-mask"
                                       id="inputUpdateHargaBeverage"
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Diskon</label>
                                <input type="text" class="form-control" data-toggle="input-mask" placeholder=""
                                       id="inputUpdateDiskonBeverage" readonly
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Harga Setelah Diskon</label>
                            <input type="text" class="form-control" disabled data-toggle="input-mask"
                                   id="inputUpdateHargaSetelahDiskonBeverage"
                                   data-mask-format="000.000.000.000.000,00" data-reverse="true">
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Kategori</label>
                            <select class="form-control" type="text" id="selectUpdateBeverageCategory" required
                                    parsley-trigger="change" autocomplete="off"></select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <input type="file" class="dropify" required data-max-file-size="2M" data-default-file=""
                                   id="inputUpdateGambarBeverage" data-allowed-file-extensions='["jpeg", "jpg","png"]'/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Lengkap</label>
                            <div id="inputUpdateLongDescriptionBeverage" style="height: 300px;">
                                <h3><span class="ql-size-large">Deskripsi!</span></h3>
                            </div> <!-- end Snow-editor-->
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputUpdateStatusBeverage"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-info btn-block" type="button" id="submitUpdateBeverage">Perbarui
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
        let cEditBeverage = {
            btn: $('#btnUpdateBeverage'),
            modal: $('#modalUpdateBeverage'),
            form: $('#formUpdateBeverage'),
            submit: $('#submitUpdateBeverage'),
            inputId: $('#inputUpdateIdBeverage'),
            inputNama: $('#inputUpdateNamaBeverage'),
            inputDeskripsiSingkat: $('#inputUpdateSimpleDescriptionBeverage'),
            inputDeskripsiLengkap: $('#inputUpdateLongDescriptionBeverage'),
            selectCategory: $('#selectUpdateBeverageCategory'),
            inputGambar: $('#inputUpdateGambarBeverage'),
            inputStatus: $('#inputUpdateStatusBeverage'),
            inputHarga: $('#inputUpdateHargaBeverage'),
            inputDiskon: $('#inputUpdateDiskonBeverage'),
            inputHargaSetelahDiskon: $('#inputUpdateHargaSetelahDiskonBeverage'),

            //INIT
            inputSwitch: new Switchery($('#inputUpdateStatusBeverage')[0], $('#inputUpdateStatusBeverage').data()),
            select2Category: $('#selectUpdateBeverageCategory').select2({
                placeholder: "Pilih Kategori"
            }),
            formValid: $('#formUpdateBeverage').parsley(),
            dropGambar: $('#inputUpdateGambarBeverage').dropify(window.dropifyConfig),

            quillinputDeskripsiLengkap: new Quill('#inputUpdateLongDescriptionBeverage', {
                theme: "snow",
                modules: window.textEditorConfig
            })
        }
        cEditBeverage.dropGambar = cEditBeverage.dropGambar.data('dropify');

        function editBeverage(id) {
            swalLoading();

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.product.beverage.show','') }}/' + id,
                success: function (data) {
                    cEditBeverage.inputId.val(data.data.id)
                    cEditBeverage.inputNama.val(data.data.name)
                    cEditBeverage.inputDeskripsiSingkat.val(data.data.simple_description)
                    cEditBeverage.inputDeskripsiLengkap.empty().append(data.data.long_description)
                    cEditBeverage.selectCategory.val(data.data.category_beverage.name)
                    cEditBeverage.inputHarga.val(data.data.original_price).trigger('input').trigger('keyup')
                    cEditBeverage.inputDiskon.val(data.data.discount_price).trigger('input').trigger('keyup')
                    cEditBeverage.dropGambar.resetPreview()
                    cEditBeverage.dropGambar.clearElement()
                    cEditBeverage.dropGambar.settings.defaultFile = data.data.image_beverage ? data.data.image_beverage.image_url : ''
                    cEditBeverage.dropGambar.file.name = data.data.image_beverage ? data.data.image_beverage.original_filename : ''
                    cEditBeverage.dropGambar.destroy()
                    cEditBeverage.dropGambar.init()
                    data.data.status ? cEditBeverage.inputSwitch.makeChecked() : cEditBeverage.inputSwitch.makeUnchecked()
                    cEditBeverage.selectCategory.empty().prop('disabled', true).select2({
                        placeholder: "Loading...",
                    });
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('admin.product.beverage.category.index') }}?array=true',
                        success: function (categoryData) {
                            Swal.close()
                            $.each(categoryData.data, function (index, value) {
                                cEditBeverage.selectCategory.append(`<option data-id="${value.id}" value="${value.id}">${value.name}</option>`)
                            });
                            cEditBeverage.selectCategory.val(data.data.category_beverage.id).prop('disabled', false).select2({
                                placeholder: "Pilih Kategori",
                            });
                        },
                    });
                    cEditBeverage.modal.modal('show')
                },
            });
        }

        $(document).ready(function () {
            cEditBeverage.modal.on("hidden.bs.modal", function () {
                cEditBeverage.form.trigger('reset')
                cEditBeverage.inputDiskon.prop('readonly', true)
                cEditBeverage.formValid.reset()
                cEditBeverage.dropGambar.resetPreview();
                cEditBeverage.dropGambar.clearElement();
            });
            cEditBeverage.inputHarga.keyup(function () {
                let value = parseFloat($(this).val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                if (value > 0) {
                    cEditBeverage.inputDiskon.prop('readonly', false)
                } else {
                    cEditBeverage.inputDiskon.prop('readonly', true).val(null)
                }

                calculate()
            });

            cEditBeverage.inputDiskon.keyup(function () {
                let value = parseFloat($(this).val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                if (value > 0) {
                    cEditBeverage.inputDiskon.prop('readonly', false)
                }
                calculate()
            });

            function calculate() {
                let harga = parseFloat(cEditBeverage.inputHarga.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                let diskon = parseFloat(cEditBeverage.inputDiskon.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                let total = null

                if (!isNaN(harga) && !isNaN(diskon)) {
                    total = harga - diskon
                } else if (!isNaN(harga)) {
                    total = harga
                }
                cEditBeverage.inputHargaSetelahDiskon.val(parseFloat(total).toFixed(2)).trigger('input')
            }

            cEditBeverage.submit.click(function () {
                    if (cEditBeverage.dropGambar.settings.defaultFile != '') {
                        cEditBeverage.form.parsley().destroy();
                        cEditBeverage.inputGambar.attr('required', false).prop('required',false);
                        cEditBeverage.formValid = cEditBeverage.form.parsley();
                        cEditBeverage.dropGambar.destroy()
                        cEditBeverage.dropGambar.init()
                    }
                    if (cEditBeverage.formValid.validate()) {
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let gambar = cEditBeverage.inputGambar[0].files;
                        let fd = new FormData();
                        let state = false
                        let diskon = parseFloat(cEditBeverage.inputDiskon.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                        let harga = parseFloat(cEditBeverage.inputHarga.val().toString().replace('.', '').replace(',', '.')).toFixed(2)
                        if (gambar.length > 0) {
                            fd.append('gambar', gambar[0])
                        }
                        if (cEditBeverage.inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('_method', 'PUT')
                        fd.append('id', cEditBeverage.inputId.val())
                        fd.append('kategori', cEditBeverage.selectCategory.val())
                        fd.append('harga', isNaN(harga) ? '' : harga)
                        fd.append('diskon', isNaN(diskon) ? '' : diskon)
                        fd.append('status', state)
                        fd.append('nama', cEditBeverage.inputNama.val())
                        fd.append('deskripsi_singkat', cEditBeverage.inputDeskripsiSingkat.val())
                        fd.append('deskripsi_lengkap', cEditBeverage.quillinputDeskripsiLengkap.root.innerHTML)

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.product.beverage.update','') }}/' + cEditBeverage.inputId.val(),
                            contentType: false,
                            processData: false,
                            data: fd,
                            success: function (data) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: `Data berhasil di perbarui!`,
                                    type: "success",
                                }).then(() => {
                                    cEditBeverage.modal.modal('hide')
                                    window.table_beverage.ajax.reload(null, false);
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
