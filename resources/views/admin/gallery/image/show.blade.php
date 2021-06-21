<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalShow" aria-hidden="true"
     id="modalShow"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formAdd" data-parsley-validate novalidate>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Gambar</label>
                            <div class="gal-detail thumb mx-auto align-middle">
                                <a href="{{asset("asset/admin/images/gallery/1.jpg")}}" class="image-popup"
                                   title="Screenshot-1" id="gambarShow">
                                    <img src="{{asset("asset/admin/images/gallery/1.jpg")}}" id="gambarShowThumblain" class="thumb-img img-fluid"
                                         alt="work-thumbnail">
                                </a>

                                <div class="text-center">
                                    <h4 id="gambarShowTitle"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3 mx-auto">
                                <input type="checkbox" disabled checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputShowStatus"/>
                            </div>
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
        let cShow = {
            btn: $('#btnShow'),
            modal: $('#modalShow'),
            form: $('#formShow'),
            submit: $('#submitShow'),
            inputGambar: $('#inputShowGambar'),
            inputGambarTitle: $('#gambarShowTitle'),
            inputStatus: $('#inputShowStatus'),

            //INIT
            inputSwitch: new Switchery($('#inputShowStatus')[0], $('#inputShowStatus').data()),
            aTagGambar : $("#gambarShow"),
            aThumbGambar : $("#gambarShowThumblain"),
            gambar: $("#gambarShow").magnificPopup({
                type: "image",
                closeOnContentClick: !0,
                mainClass: "mfp-fade",
                gallery: {enabled: !0, navigateByImgClick: !0, preload: [0, 1]},
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.close = function () {
                            $('#modalShow').modal('show')
                            $.magnificPopup.proto.close.call(this);
                        };
                    }
                }
            })
        }

        function showPromo(id) {
            swalLoading();
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.gallery.image.show','') }}/' + id,
                success: function (data) {
                    Swal.close()
                    cShow.aTagGambar.attr('href',data.data.image_url)
                    cShow.aTagGambar.attr('title',data.data.original_filename)
                    cShow.aThumbGambar.attr('src',data.data.image_url)
                    cShow.inputGambarTitle.text(data.data.original_filename)
                    data.data.status ? cShow.inputSwitch.makeChecked() : cShow.inputSwitch.makeUnchecked()
                    cShow.modal.modal('show')
                },
            });
        }

        $(document).ready(function () {
            cShow.aTagGambar.click(function () {
                cShow.modal.modal('hide')
            })
        })
    </script>

@endsection
