@extends('layouts.admin')

@section('title','Liberica Admin | About Us')

@section('title.page','About')

@section('page.about','active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="row col-12 mb-2 px-0">
                    <h4 class="mt-0 header-title col-12 col-md-8 mb-2">About Us</h4>
                </div>

                <form class="row" action="#" id="form" data-parsley-validate novalidate>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Judul</label>
                            <input class="form-control" type="text" id="inputJudul" required
                                   placeholder="Judul"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Sub Judul</label>
                            <input class="form-control" type="text" id="inputSubJudul" required
                                   placeholder="Judul"
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Deskripsi Singkat</label>
                            <textarea class="form-control" type="text" id="inputDeskripsi" required
                                      placeholder="Deskripsi Singkat"
                                      parsley-trigger="change" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-info btn-block" type="button" id="submit">Simpan
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('css')

@endpush

@push('js')
    <script src="{{asset("asset/admin/libs/parsleyjs/parsley.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/parsleyjs/id.js")}}"></script>

    <script>
        let form = $('#form')
        let judul = $('#inputJudul')
        let subJudul = $('#inputSubJudul')
        let deskripsi = $('#inputDeskripsi')
        let submit = $('#submit')

        async function getData(){
            swalLoading()
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.about.index') }}',
                success: function (data) {
                    Swal.close()
                    if(data.data){
                        judul.val(data.data.title)
                        subJudul.val(data.data.sub_title)
                        deskripsi.val(data.data.description)
                    }
                },
            });
        }

        $(document).ready(function () {
            getData();

            let formValid = form.parsley()

            submit.click(function (){
                if (formValid.validate()) {
                    swalLoading('Mohon Menunggu','Data Sedang di Simpan');
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('admin.about.store') }}',
                        data: {
                            'judul': judul.val(),
                            'sub_judul': subJudul.val(),
                            'deskripsi': deskripsi.val()
                        },
                        dataType: 'json',
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Data berhasil di perbarui!`,
                                type: "success",
                            }).then(() => {
                                getData();
                            })
                        },

                    });

                }
            })
        })
    </script>
@endpush
