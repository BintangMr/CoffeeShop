<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShowSerbuk" aria-hidden="true"
     id="modalShowSerbuk"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Serbuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formShowSerbuk" data-parsley-validate novalidate>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama Serbuk</label>
                            <input class="form-control" type="text" id="inputShowNamaSerbuk" disabled
                                   placeholder="Nama Serbuk"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputShowSimpleDescriptionSerbuk" disabled
                                      placeholder="Deskripsi Singkat"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Harga</label>
                                <input type="text" class="form-control" data-toggle="input-mask"
                                       id="inputShowHargaSerbuk" disabled
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Diskon</label>
                                <input type="text" class="form-control" data-toggle="input-mask" placeholder=""
                                       id="inputShowDiskonSerbuk" disabled
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Harga Setelah Diskon</label>
                            <input type="text" class="form-control" disabled data-toggle="input-mask"
                                   id="inputShowHargaSetelahDiskonSerbuk" aria-disabled=""
                                   data-mask-format="000.000.000.000.000,00" data-reverse="true">
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Kategori</label>
                            <input class="form-control" type="text" id="selectShowSerbukCategory" disabled
                                   parsley-trigger="change" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <div class="gal-detail thumb">
                                <a href="{{asset("asset/admin/images/gallery/1.jpg")}}" class="image-popup"
                                   title="Screenshot-1" id="gambarShowSerbuk">
                                    <img src="{{asset("asset/admin/images/gallery/1.jpg")}}" id="gambarShowThumblainSerbuk" class="thumb-img img-fluid"
                                         alt="work-thumbnail">
                                </a>

                                <div class="text-center">
                                    <h4 id="gambarShowSerbukTitle"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Lengkap</label>
                            <div id="inputShowLongDescriptionSerbuk">
                            </div> <!-- end Snow-editor-->
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputShowStatusSerbuk"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('css')
    @parent
    <link rel="stylesheet" href="{{asset("asset/admin/libs/magnific-popup/magnific-popup.css")}}"/>
@endsection

@section('js')
    @parent

    <!-- isotope filter plugin -->
    <script src="{{asset("asset/admin/libs/isotope/isotope.pkgd.min.js")}}"></script>

    <!--venobox lightbox-->
    <script src="{{asset("asset/admin/libs/magnific-popup/jquery.magnific-popup.min.js")}}"></script>

    <script>
        let cShowSerbuk = {
            btn: $('#btnShowSerbuk'),
            modal: $('#modalShowSerbuk'),
            form: $('#formShowSerbuk'),
            submit: $('#submitShowSerbuk'),
            inputNama: $('#inputShowNamaSerbuk'),
            inputDeskripsiSingkat: $('#inputShowSimpleDescriptionSerbuk'),
            inputDeskripsiLengkap: $('#inputShowLongDescriptionSerbuk'),
            selectCategory: $('#selectShowSerbukCategory'),
            inputGambar: $('#inputShowGambarSerbuk'),
            inputGambarTitle: $('#gambarShowSerbukTitle'),
            inputStatus: $('#inputShowStatusSerbuk'),
            inputHarga: $('#inputShowHargaSerbuk'),
            inputDiskon: $('#inputShowDiskonSerbuk'),
            inputHargaSetelahDiskon: $('#inputShowHargaSetelahDiskonSerbuk'),

            //INIT
            inputSwitch: new Switchery($('#inputShowStatusSerbuk')[0], $('#inputShowStatusSerbuk').data()),
            aTagGambar : $("#gambarShowSerbuk"),
            aThumbGambar : $("#gambarShowThumblainSerbuk"),
            gambar: $("#gambarShowSerbuk").magnificPopup({
                type: "image",
                closeOnContentClick: !0,
                mainClass: "mfp-fade",
                gallery: {enabled: !0, navigateByImgClick: !0, preload: [0, 1]},
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.close = function () {
                            $('#modalShowSerbuk').modal('show')
                            $.magnificPopup.proto.close.call(this);
                        };
                    }
                }
            })
        }

        function showSerbuk(id) {
            swalLoading();

            function calculate(ori_harga, ori_diskon) {
                let harga = parseFloat(ori_harga.toString()).toFixed(2)
                let diskon = parseFloat(ori_diskon.toString()).toFixed(2)
                let total = null

                if (!isNaN(harga) && !isNaN(diskon)) {
                    total = harga - diskon
                } else if (!isNaN(harga)) {
                    total = harga
                }
                cShowSerbuk.inputHargaSetelahDiskon.val(formatter.format(total))
            }

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.product.serbuk.show','') }}/' + id,
                success: function (data) {
                    Swal.close()
                    cShowSerbuk.inputNama.val(data.data.name)
                    cShowSerbuk.inputDeskripsiSingkat.val(data.data.simple_description)
                    cShowSerbuk.inputDeskripsiLengkap.empty().append(data.data.long_description)
                    cShowSerbuk.selectCategory.val(data.data.category_serbuk.name)
                    cShowSerbuk.inputHarga.val(formatter.format(data.data.original_price)).trigger('change')
                    cShowSerbuk.inputDiskon.val(formatter.format(data.data.discount_price ? data.data.discount_price : 0 ))
                    cShowSerbuk.aTagGambar.attr('href',data.data.image_serbuk ? data.data.image_serbuk.image_url : '')
                    cShowSerbuk.aThumbGambar.attr('src',data.data.image_serbuk ? data.data.image_serbuk.image_url : '')
                    cShowSerbuk.inputGambarTitle.text(data.data.image_serbuk ? data.data.image_serbuk.original_filename : '')
                    calculate(data.data.original_price, data.data.discount_price ? data.data.discount_price : 0)
                    data.data.status ? cShowSerbuk.inputSwitch.makeChecked() : cShowSerbuk.inputSwitch.makeUnchecked()
                    cShowSerbuk.modal.modal('show')
                },
            });
        }

        $(document).ready(function () {
            cShowSerbuk.aTagGambar.click(function () {
                cShowSerbuk.modal.modal('hide')
            })
        })
    </script>

@endsection
