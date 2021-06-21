@extends('layouts.auth')
@section('title','Log in')

@push('css')

@endpush

@section('content')
    <div class="card">

        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h4 class="text-uppercase mt-0">Sign In</h4>
            </div>

            <form action="#" id="form" data-parsley-validate novalidate>

                <div class="form-group mb-3">
                    <label for="email">Email address</label>
                    <input class="form-control" type="email" id="email" required placeholder="Masukkan Email Anda"
                           parsley-trigger="change" parsley-type="email" autocomplete="off">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" required id="password" parsley-trigger="change"
                           placeholder="Masukkan Password Anda">
                </div>


                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="button" id="submit"> Log In</button>
                </div>

            </form>

        </div> <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
        <div class="col-12 text-center">
            <p><a href="pages-recoverpw.html" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>Lupa Password?</a>
            </p>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('js')
    <!-- Validation js (Parsleyjs) -->
    <script src="{{asset("asset/admin/libs/parsleyjs/parsley.min.js")}}"></script>
    <script src="{{asset("asset/admin/libs/parsleyjs/id.js")}}"></script>

    <!-- validation init -->

    <script>
        $(document).ready(function (e) {
            let form = $('#form')
            let email = $('#email')
            let password = $('#password')
            let btnSubmit = $('#submit')

            //Init Validation
            let formValid = form.parsley()

            btnSubmit.click(function (e) {
                e.preventDefault()
                if (formValid.validate()) {
                    swalLoading('Mohon Menunggu!','Data sedang dalam pengecekan')
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('login') }}',
                        data: {
                            'email': email.val(),
                            'password': password.val()
                        },
                        dataType: 'json',
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Selamat Datang ${data.data.user.name}!`,
                                type: "success",
                            }).then(() => {
                                if(data.data.url){
                                    window.location.href = data.data.url
                                }
                            })
                        },

                    });
                }
            });
        });
    </script>
@endpush
