<div class="col-12 col-md-4 text-md-right mb-2">
    <button class="mt-0 btn btn-info waves-effect waves-light btn-block" id="btnAddBeverage">
        <i class="fa fa-plus mr-1"></i> <span>  Tambah Beverage </span>
    </button>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createBeverage" aria-hidden="true"
     id="modalAddBeverage"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Beverage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formAddBeverage" data-parsley-validate novalidate>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama Beverage</label>
                            <input class="form-control" type="text" id="inputAddNamaBeverage" required
                                   placeholder="Nama Beverage"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputAddSimpleDescriptionBeverage" required
                                      placeholder="Deskripsi Singkat"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Harga</label>
                                <input type="text" class="form-control" data-toggle="input-mask" id="inputAddHargaBeverage"
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Diskon</label>
                                <input type="text" class="form-control" data-toggle="input-mask" placeholder="" id="inputAddDiskonBeverage" readonly
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Harga Setelah Diskon</label>
                            <input type="text" class="form-control" disabled data-toggle="input-mask" id="inputAddHargaSetelahDiskonBeverage"
                                   data-mask-format="000.000.000.000.000,00" data-reverse="true">
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Kategori</label>
                            <select class="form-control" type="text" id="selectAddBeverageCategory" required
                                    parsley-trigger="change" autocomplete="off"></select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <input type="file" class="dropify" required data-max-file-size="2M"
                                   id="inputAddGambarBeverage" data-allowed-file-extensions='["jpeg", "jpg","png"]'/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Lengkap</label>
                            <div id="inputAddLongDescriptionBeverage" style="height: 300px;">
                                <h3><span class="ql-size-large">Deskripsi!</span></h3>
                            </div> <!-- end Snow-editor-->
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputAddStatusBeverage"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-info btn-block" type="button" id="submitAddBeverage">Simpan
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
            let btn = $('#btnAddBeverage')
            let modal = $('#modalAddBeverage')
            let form = $('#formAddBeverage')
            let submit = $('#submitAddBeverage')
            let inputNama = $('#inputAddNamaBeverage')
            let inputDeskripsiSingkat = $('#inputAddSimpleDescriptionBeverage')
            let inputDeskripsiLengkap = $('#inputAddLongDescriptionBeverage')
            let selectCategory = $('#selectAddBeverageCategory')
            let inputGambar = $('#inputAddGambarBeverage')
            let inputStatus = $('#inputAddStatusBeverage')
            let inputHarga = $('#inputAddHargaBeverage')
            let inputDiskon = $('#inputAddDiskonBeverage')
            let inputHargaSetelahDiskon = $('#inputAddHargaSetelahDiskonBeverage')

            //INIT
            let inputSwitch = new Switchery(inputStatus[0], inputStatus.data());
            let select2Category = selectCategory.select2({
                placeholder: "Pilih Kategori"
            })
            let formValid = form.parsley()
            let dropGambar = inputGambar.dropify(window.dropifyConfig);
            dropGambar = dropGambar.data('dropify');
            var quillinputDeskripsiLengkap = new Quill('#inputAddLongDescriptionBeverage', {
                theme: "snow",
                modules: window.textEditorConfig
            });
            //-------------

            //Mount
            btn.click(function () {
                getDataCategory();
            })
            modal.on("hidden.bs.modal", function () {
                form.trigger('reset')
                inputDiskon.prop('readonly',true)
                formValid.reset()
                dropGambar.resetPreview();
                dropGambar.clearElement();
            });
            inputHarga.keyup(function() {
                let value = parseFloat($(this).val().toString().replace('.','').replace(',','.')).toFixed(2)
                if(value > 0){
                    inputDiskon.prop('readonly',false)
                }else{
                    inputDiskon.prop('readonly',true).val(null)
                }

                calculate()
            });

            inputDiskon.keyup(function() {
                let value = parseFloat($(this).val().toString().replace('.','').replace(',','.')).toFixed(2)
                if(value > 0){
                    inputDiskon.prop('readonly',false)
                }
                calculate()
            });

            function calculate(){
                let harga = parseFloat(inputHarga.val().toString().replace('.','').replace(',','.')).toFixed(2)
                let diskon = parseFloat(inputDiskon.val().toString().replace('.','').replace(',','.')).toFixed(2)
                let total = null

                if(!isNaN(harga) && !isNaN(diskon)){
                    total =  harga - diskon
                }else if (!isNaN(harga)){
                    total = harga
                }
                inputHargaSetelahDiskon.val(total)
            }

            async function getDataCategory() {
                selectCategory.empty().prop('disabled', true).select2({
                    placeholder: "Loading...",
                });
                $.ajax({
                    type: 'GET',
                    url: '{{ route('admin.product.beverage.category.index') }}?array=true',
                    success: function (data) {
                        $.each(data.data, function (index, value) {
                            selectCategory.append(`<option data-id="${value.id}" value="${value.id}">${value.name}</option>`)
                        });
                        selectCategory.val(null).prop('disabled', false).select2({
                            placeholder: "Pilih Kategori",
                        });
                        modal.modal('show')
                    },
                });
            }

            submit.click(function () {
                    if (formValid.validate()) {
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let gambar = inputGambar[0].files;
                        let fd = new FormData();
                        let state = false
                        let diskon = parseFloat(inputDiskon.val().toString().replace('.','').replace(',','.')).toFixed(2)
                        let harga = parseFloat(inputHarga.val().toString().replace('.','').replace(',','.')).toFixed(2)
                        if (gambar.length > 0) {
                            fd.append('gambar', gambar[0])
                        }
                        if (inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('kategori', selectCategory.val())
                        fd.append('harga', isNaN(harga) ? '' : harga)
                        fd.append('diskon', isNaN(diskon) ? '' : diskon)
                        fd.append('status', state)
                        fd.append('nama', inputNama.val())
                        fd.append('deskripsi_singkat', inputDeskripsiSingkat.val())
                        fd.append('deskripsi_lengkap', quillinputDeskripsiLengkap.root.innerHTML)

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.product.beverage.store') }}',
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
                                    window.table_beverage.ajax.reload( null, false );
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
