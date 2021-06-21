<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true"
     id="modalUpdate"
     style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Artikel </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="row" action="#" id="formUpdate" data-parsley-validate novalidate>
                    <input id="inputUpdateId" class="d-none">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Judul Artikel</label>
                            <input class="form-control" type="text" id="inputUpdateJudul" required
                                   placeholder="Judul artikel"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputUpdateCaption" required
                                      placeholder="Deskripsi Singkat" maxlength="85"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group mb-3">
                            <label for="email">Gambar </label>
                            <input type="file" class="dropify" required data-max-file-size="2M" data-default-file=""
                                   id="inputUpdateGambar" data-allowed-file-extensions='["jpeg", "jpg","png"]'/>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Lengkap</label>
                            <div id="inputUpdateDescription" style="height: 300px;">

                            </div> <!-- end Snow-editor-->
                        </div>
                    </div>
                    <div class="col-12 row">
                        <div class="col-md-10 col-sm-12">
                            <div class="form-group mb-3">
                                <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" value="true"
                                       id="inputUpdateStatus"/>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-info btn-block" type="button" id="submitUpdate">Perbarui
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
        let cEdit = {
            btn: $('#btnUpdate'),
            modal: $('#modalUpdate'),
            form: $('#formUpdate'),
            submit: $('#submitUpdate'),
            inputId: $('#inputUpdateId'),
            inputTitle: $('#inputUpdateJudul'),
            inputCaption: $('#inputUpdateCaption'),
            inputDescription: $('#inputUpdateDescription'),
            inputGambar: $('#inputUpdateGambar'),
            inputStatus: $('#inputUpdateStatus'),

            //INIT
            inputSwitch: new Switchery($('#inputUpdateStatus')[0], $('#inputUpdateStatus').data()),

            formValid: $('#formUpdate').parsley(),
            dropGambar: $('#inputUpdateGambar').dropify(window.dropifyConfig),

            quillinputDeskripsi: new Quill('#inputUpdateDescription', {
                theme: "snow",
                modules: window.textEditorConfig
            })
        }
        cEdit.dropGambar = cEdit.dropGambar.data('dropify');

        function destory_editor(selector){
            if($(selector)[0])
            {
                var content = $(selector).find('.ql-editor').html();
                $(selector).html(content);

                $(selector).siblings('.ql-toolbar').remove();
                $(selector + " *[class*='ql-']").removeClass (function (index, css) {
                    return (css.match (/(^|\s)ql-\S+/g) || []).join(' ');
                });

                $(selector + "[class*='ql-']").removeClass (function (index, css) {
                    return (css.match (/(^|\s)ql-\S+/g) || []).join(' ');
                });
            }
            else
            {
                console.error('editor not exists');
            }
        }

        function editArticle(id) {
            swalLoading();
            destory_editor('#inputUpdateDescription');
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.article.show','') }}/' + id,
                success: function (data) {
                    cEdit.inputId.val(data.data.id)
                    cEdit.inputTitle.val(data.data.title)
                    cEdit.inputCaption.val(data.data.caption)
                    cEdit.inputDescription.empty().append(data.data.description)
                    cEdit.dropGambar.resetPreview()
                    cEdit.dropGambar.clearElement()
                    cEdit.dropGambar.settings.defaultFile = data.data.image ? data.data.image.image_url : ''
                    cEdit.dropGambar.file.name = data.data.image ? data.data.image.original_filename : ''
                    cEdit.dropGambar.destroy()
                    cEdit.dropGambar.init()
                    data.data.status ? cEdit.inputSwitch.makeChecked() : cEdit.inputSwitch.makeUnchecked()
                    cEdit.quillinputDeskripsi = new Quill('#inputUpdateDescription', {
                        theme: "snow",
                        modules: window.textEditorConfig
                    })
                    Swal.close()
                    cEdit.modal.modal('show')
                },
            });
        }

        $(document).ready(function () {
            cEdit.modal.on("hidden.bs.modal", function () {
                cEdit.form.trigger('reset')
                cEdit.formValid.reset()
                cEdit.dropGambar.resetPreview();
                cEdit.dropGambar.clearElement();
            });

            cEdit.submit.click(function () {
                    if (cEdit.dropGambar.settings.defaultFile != '') {
                        cEdit.form.parsley().destroy();
                        cEdit.inputGambar.attr('required', false).prop('required',false);
                        cEdit.formValid = cEdit.form.parsley();
                        cEdit.dropGambar.destroy()
                        cEdit.dropGambar.init()
                    }
                    if (cEdit.formValid.validate()) {
                        swalLoading('Mohon Menunggu', 'Data Sedang di Simpan');
                        let gambar = cEdit.inputGambar[0].files;
                        let fd = new FormData();
                        let state = false
                        if (gambar.length > 0) {
                            fd.append('gambar', gambar[0])
                        }
                        if (cEdit.inputStatus.is(':checked')) {
                            state = true
                        }

                        fd.append('_method', 'PUT')
                        fd.append('id', cEdit.inputId.val())
                        fd.append('judul', cEdit.inputTitle.val())
                        fd.append('caption', cEdit.inputCaption.val())
                        fd.append('status', state)
                        fd.append('deskripsi', cEdit.quillinputDeskripsi.root.innerHTML)

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('admin.article.update','') }}/' + cEdit.inputId.val(),
                            contentType: false,
                            processData: false,
                            data: fd,
                            success: function (data) {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: `Data berhasil di perbarui!`,
                                    type: "success",
                                }).then(() => {
                                    cEdit.modal.modal('hide')
                                    window.table_article.ajax.reload(null, false);
                                })
                            },

                        });

                    }
                }
            )

        });
    </script>

@endsection
