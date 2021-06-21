<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createSerbukCategory" aria-hidden="true" id="modalShowCategory"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Kategori</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="#" id="formShowCategory" data-parsley-validate novalidate>

                    <div class="form-group mb-3">
                        <label for="email">Nama Kategori</label>
                        <input class="form-control" type="text" id="inputShowNamaCategory" required placeholder="Nama Kategori"
                               parsley-trigger="change" autocomplete="off" disabled>
                    </div>

                    <div class="form-group mb-3">
                        <input type="checkbox" disabled data-plugin="switchery"  data-color="#00b19d" value="true" id="inputShowStatusCategory" checked/>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@section('js')
    @parent

    <script>
        let cShowCategory = {
            form : $('#formShowCategory'),
            inputNama : $('#inputShowNamaCategory'),
            inputStatus : $('#inputShowStatusCategory'),
            inputStatusSwitch : new Switchery($('#inputShowStatusCategory')[0],$('#inputShowStatusCategory').data()),
            formValid : $('#formShowCategory').parsley(),
            modal : $('#modalShowCategory')
        }

        function showCategory(id){
            swalLoading();
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.product.serbuk.category.show','') }}/'+id,
                success: function (data) {
                    Swal.close()
                    cShowCategory.inputNama.val(data.data.name)
                    data.data.status ? cShowCategory.inputStatusSwitch.makeChecked() : cShowCategory.inputStatusSwitch.makeUnchecked()
                    cShowCategory.modal.modal('show')
                },
            });
        }

        $(document).ready(function(){
            cShowCategory.modal.on("hidden.bs.modal", function () {
                cShowCategory.form.trigger('reset')
                cShowCategory.formValid.reset()
            });
        });
    </script>

@endsection
