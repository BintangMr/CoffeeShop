<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createSerbukCategory" aria-hidden="true" id="modalEditCategory"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="#" id="formEditCategory" data-parsley-validate novalidate>
                    <input class="d-none" id="inputEditIdCategory" type="text">
                    <div class="form-group mb-3">
                        <label for="email">Nama Kategori</label>
                        <input class="form-control" type="text" id="inputEditNamaCategory" required placeholder="Nama Kategori"
                               parsley-trigger="change" autocomplete="off">
                    </div>

                    <div class="form-group mb-3">
                        <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true" id="inputEditStatusCategory"/>
                    </div>

                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-info btn-block" type="button" id="submitEditCategory">Perbarui</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@section('js')
    @parent

    <script>
        let cEditCategory = {
            modal : $('#modalEditCategory'),
            form : $('#formEditCategory'),
            submit : $('#submitEditCategory'),
            inputId : $('#inputEditIdCategory'),
            inputNama : $('#inputEditNamaCategory'),
            inputStatus : $('#inputEditStatusCategory'),

            inputStatusSwitch : new Switchery($('#inputEditStatusCategory')[0],$('#inputEditStatusCategory').data()),
            formValid : $('#formEditCategory').parsley()
        }


        function editCategory(id){
            swalLoading();
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.product.serbuk.category.show','') }}/'+id,
                success: function (data) {
                    Swal.close()
                    cEditCategory.inputNama.val(data.data.name)
                    cEditCategory.inputId.val(data.data.id)
                    cEditCategory.inputStatusSwitch.enable()
                    data.data.status ? cEditCategory.inputStatusSwitch.makeChecked() : cEditCategory.inputStatusSwitch.makeUnchecked()
                    cEditCategory.modal.modal('show')
                },
            });
        }

        $(document).ready(function(){

            cEditCategory.modal.on("hidden.bs.modal", function () {
                cEditCategory.form.trigger('reset')
                cEditCategory.formValid.reset()
            });

            cEditCategory.submit.click(function (){
                if (cEditCategory.formValid.validate()) {
                    swalLoading('Mohon Menunggu','Data Sedang di Simpan');

                    let state = false
                    if (cEditCategory.inputStatus.is(':checked')) {
                        state = true
                    }

                    $.ajax({
                        type: 'PUT',
                        url: '{{ route('admin.product.serbuk.category.update','') }}/'+cEditCategory.inputId.val(),
                        data: {
                            'id': cEditCategory.inputId.val(),
                            'nama': cEditCategory.inputNama.val(),
                            'status': state
                        },
                        dataType: 'json',
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Data berhasil di perbaui!`,
                                type: "success",
                            }).then(() => {
                                cEditCategory.modal.modal('hide')
                                window.table_categories.ajax.reload( null, false );
                            })
                        },

                    });

                }
            })

        });
    </script>

@endsection
