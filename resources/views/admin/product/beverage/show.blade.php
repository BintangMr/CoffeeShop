<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShowBeverage" aria-hidden="true"
     id="modalShowBeverage"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Beverage</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formShowBeverage" data-parsley-validate novalidate>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Nama Beverage</label>
                            <input class="form-control" type="text" id="inputShowNamaBeverage" disabled
                                   placeholder="Nama Beverage"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputShowSimpleDescriptionBeverage" disabled
                                      placeholder="Deskripsi Singkat"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Harga</label>
                                <input type="text" class="form-control" data-toggle="input-mask"
                                       id="inputShowHargaBeverage" disabled
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label for="email">Diskon</label>
                                <input type="text" class="form-control" data-toggle="input-mask" placeholder=""
                                       id="inputShowDiskonBeverage" disabled
                                       data-mask-format="000.000.000.000.000,00" data-reverse="true">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Harga Setelah Diskon</label>
                            <input type="text" class="form-control" disabled data-toggle="input-mask"
                                   id="inputShowHargaSetelahDiskonBeverage" aria-disabled=""
                                   data-mask-format="000.000.000.000.000,00" data-reverse="true">
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Kategori</label>
                            <input class="form-control" type="text" id="selectShowBeverageCategory" disabled
                                   parsley-trigger="change" autocomplete="off">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <div class="gal-detail thumb">
                                <a href="{{asset("asset/admin/images/gallery/1.jpg")}}" class="image-popup"
                                   title="Screenshot-1" id="gambarShowBeverage">
                                    <img src="{{asset("asset/admin/images/gallery/1.jpg")}}" id="gambarShowThumblainBeverage" class="thumb-img img-fluid"
                                         alt="work-thumbnail">
                                </a>

                                <div class="text-center">
                                    <h4 id="gambarShowBeverageTitle"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Lengkap</label>
                            <div id="inputShowLongDescriptionBeverage">
                            </div> <!-- end Snow-editor-->
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputShowStatusBeverage"/>
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
        let cShowBeverage = {
            btn: $('#btnShowBeverage'),
            modal: $('#modalShowBeverage'),
            form: $('#formShowBeverage'),
            submit: $('#submitShowBeverage'),
            inputNama: $('#inputShowNamaBeverage'),
            inputDeskripsiSingkat: $('#inputShowSimpleDescriptionBeverage'),
            inputDeskripsiLengkap: $('#inputShowLongDescriptionBeverage'),
            selectCategory: $('#selectShowBeverageCategory'),
            inputGambar: $('#inputShowGambarBeverage'),
            inputGambarTitle: $('#gambarShowBeverageTitle'),
            inputStatus: $('#inputShowStatusBeverage'),
            inputHarga: $('#inputShowHargaBeverage'),
            inputDiskon: $('#inputShowDiskonBeverage'),
            inputHargaSetelahDiskon: $('#inputShowHargaSetelahDiskonBeverage'),

            //INIT
            inputSwitch: new Switchery($('#inputShowStatusBeverage')[0], $('#inputShowStatusBeverage').data()),
            aTagGambar : $("#gambarShowBeverage"),
            aThumbGambar : $("#gambarShowThumblainBeverage"),
            gambar: $("#gambarShowBeverage").magnificPopup({
                type: "image",
                closeOnContentClick: !0,
                mainClass: "mfp-fade",
                gallery: {enabled: !0, navigateByImgClick: !0, preload: [0, 1]},
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.close = function () {
                            $('#modalShowBeverage').modal('show')
                            $.magnificPopup.proto.close.call(this);
                        };
                    }
                }
            })
        }

        function showBeverage(id) {
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
                cShowBeverage.inputHargaSetelahDiskon.val(formatter.format(total))
            }

            $.ajax({
                type: 'GET',
                url: '{{ route('admin.product.beverage.show','') }}/' + id,
                success: function (data) {
                    Swal.close()
                    cShowBeverage.inputNama.val(data.data.name)
                    cShowBeverage.inputDeskripsiSingkat.val(data.data.simple_description)
                    cShowBeverage.inputDeskripsiLengkap.empty().append(data.data.long_description)
                    cShowBeverage.selectCategory.val(data.data.category_beverage.name)
                    cShowBeverage.inputHarga.val(formatter.format(data.data.original_price)).trigger('change')
                    cShowBeverage.inputDiskon.val(formatter.format(data.data.discount_price ? data.data.discount_price : 0))
                    cShowBeverage.aTagGambar.attr('href',data.data.image_beverage ? data.data.image_beverage.image_url : '')
                    cShowBeverage.aThumbGambar.attr('src',data.data.image_beverage ? data.data.image_beverage.image_url : '')
                    cShowBeverage.inputGambarTitle.text(data.data.image_beverage ? data.data.image_beverage.original_filename : '')
                    calculate(data.data.original_price, data.data.discount_price ? data.data.discount_price : 0)
                    data.data.status ? cShowBeverage.inputSwitch.makeChecked() : cShowBeverage.inputSwitch.makeUnchecked()
                    cShowBeverage.modal.modal('show')
                },
            });
        }

        $(document).ready(function () {
            cShowBeverage.aTagGambar.click(function () {
                cShowBeverage.modal.modal('hide')
            })
        })
    </script>

@endsection
