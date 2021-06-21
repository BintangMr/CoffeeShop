<div class="col-12 col-md-4 text-md-right mb-2">
    <button class="mt-0 btn btn-info waves-effect waves-light btn-block" id="btnAddCategory">
        <i class="fa fa-plus mr-1"></i> <span>  Tambah Kategori </span>
    </button>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createSerbukCategory" aria-hidden="true" id="modalAddCategory"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="#" id="formAddCategory" data-parsley-validate novalidate>

                    <div class="form-group mb-3">
                        <label for="email">Nama Kategori</label>
                        <input class="form-control" type="text" id="inputAddNamaCategory" required placeholder="Nama Kategori"
                               parsley-trigger="change" autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true" id="inputAddStatusCategory"/>
                    </div>

                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-info btn-block" type="button" id="submitAddCategory">Simpan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@section('js')
    @parent

    <script>
        $(document).ready(function(){
            let btn = $('#btnAddCategory')
            let modal = $('#modalAddCategory')
            let form = $('#formAddCategory')
            let submit = $('#submitAddCategory')
            let inputNama = $('#inputAddNamaCategory')
            let inputStatus = $('#inputAddStatusCategory')

            let inputStatusSwitch = new Switchery(inputStatus[0],inputStatus.data());
            let formValid = form.parsley()

            btn.click(function (){
                modal.modal('show')
            })

            modal.on("hidden.bs.modal", function () {
                form.trigger('reset')
                formValid.reset()
            });

            submit.click(function (){
                if (formValid.validate()) {
                    swalLoading('Mohon Menunggu','Data Sedang di Simpan');

                    let state = false
                    if (inputStatus.is(':checked')) {
                        state = true
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.product.serbuk.category.store') }}',
                        data: {
                            'nama': inputNama.val(),
                            'status': state
                        },
                        dataType: 'json',
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Data berhasil di tambahkan!`,
                                type: "success",
                            }).then(() => {
                                modal.modal('hide')
                                window.table_categories.ajax.reload( null, false );
                            })
                        },

                    });

                }
            })

        });
    </script>

@endsection
