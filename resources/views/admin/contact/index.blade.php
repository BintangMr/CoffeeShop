@extends('layouts.admin')

@section('title','Liberica Admin | Kontak')

@section('title.page','Kontak')

@section('page.kontak','active')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <div class="row col-12 mb-2 px-0">
                    <h4 class="mt-0 header-title col-12 col-md-8 mb-2">Kontak</h4>
                </div>

                <form class="row" action="#" id="form" data-parsley-validate novalidate>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="email">Market Place Url</label>
                            <input class="form-control" id="inputAddMarket" required type="url"
                                   data-parsley-type="url"
                                   placeholder="Url "
                                   parsley-trigger="change" autocomplete="off">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Whatsapp Url</label>
                            <input class="form-control" id="inputAddWhatsapp" required type="url"
                                   data-parsley-type="url"
                                   placeholder="Url "
                                   parsley-trigger="change" autocomplete="off">
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
        let market = $('#inputAddMarket')
        let whatsapp = $('#inputAddWhatsapp')
        let submit = $('#submit')

        async function getData(){
            swalLoading()
            $.ajax({
                type: 'GET',
                url: '{{ route('admin.contact.index') }}',
                success: function (data) {
                    Swal.close()
                    if(data.data){
                        market.val(data.data.market_place)
                        whatsapp.val(data.data.whatsapp)
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
                        url: '{{ route('admin.contact.store') }}',
                        data: {
                            'market': market.val(),
                            'whatsapp': whatsapp.val(),
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
