<article class="post_item post_item_single post_featured_default post_format_standard page hentry"
         style="display: block" id="maps-section">
    <section class="post_content">
        <div class="vc_row wpb_row vc_row-fluid vc_custom_1455186654343">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                    <div class="wpb_wrapper">
                        <h2 class="sc_title sc_title_regular sc_align_center margin_top_null margin_bottom_small">
                            Kontak</h2>
                        <img class="center-block margin_bottom_small" src="{{ asset('asset/img/bawah_judul.png') }}"/>
                        <div class="sc_section margin_bottom_large aligncenter">
                            <div class="sc_section_inner">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <div class="sc_columns columns_wrap">
                                            <div class="column-1_2">
                                                <div class="mapouter">
                                                    <div class="gmap_canvas">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9315346691756!2d108.3965706147734!3d-7.017333994931114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f3faee4a0a357%3A0xa20bce5b079a8b94!2sKopi%20liberika%20cipasung!5e0!3m2!1sid!2sid!4v1623653360521!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column-1_2">
                                                <div class="sc_section margin_right_null margin_left_null aligncenter">
                                                    <div class="sc_section_inner">
                                                        <h5 class="sc_title sc_title_regular">Kritik dan saran</h5>
                                                        <div id="sc_form_132_wrap" class="sc_form_wrap">
                                                            <div id="sc_form_132" class="sc_form sc_form_style_form_1 margin_top_small margin_bottom_medium">
                                                                <form id="form_feedback" data-formtype="form_1" method="post" action="" class="form-row">
                                                                    <div class="sc_form_info">
                                                                        <div class="sc_form_item sc_form_field label_over">
                                                                            <label class="required" for="form_feedback_name">Nama</label>
                                                                            <input id="form_feedback_name" type="text" name="username" placeholder="Nama *" required>
                                                                        </div>
                                                                        <div class="sc_form_item sc_form_field label_over margin_bottom_small">
                                                                            <label class="required" for="form_feedback_email">E-mail</label>
                                                                            <input id="form_feedback_email" type="email" name="email" placeholder="E-mail *" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="sc_form_item sc_form_message label_over">
                                                                        <label class="required" for="form_feedback_pesan">Pesan</label>
                                                                        <textarea id="form_feedback_pesan" name="message" placeholder="Pesan" required></textarea>
                                                                    </div>
                                                                    <div class="sc_form_item sc_form_button">
                                                                        <button class="maps-text" id="btnSubmitFeedback">Kirim</button>
                                                                    </div>
                                                                    <div class="result sc_infobox"></div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

@push('css')
    <style>
        .maps-text{color:#7e481c;border:2px solid #7e481c}.maps-text:hover{color:#daa520FF;border:2px solid #daa520FF}.maps-text:after{border:#7e481c}
    </style>
@endpush

@section('js')
    @parent
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
            },
            error: function (x, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });

        jQuery(document).ready(function () {
            let form = jQuery('#form_feedback');
            let inputName = jQuery('#form_feedback_name');
            let inputEmail = jQuery('#form_feedback_email');
            let inputPesan = jQuery('#form_feedback_pesan');
            let btnSubmit = jQuery('#btnSubmitFeedback');

            btnSubmit.click(function (e) {
                e.preventDefault()

                if(!inputName.val() || !inputEmail.val() || !inputPesan.val()){
                    Swal.fire({
                        icon: 'error',
                        title: 'Form harus terisi',
                        text: 'Pastikan nama, email, dan pesan sudah terisi ya!',
                    })
                }else{
                    Swal.fire({
                        title: "Mohon menunggu",
                        html: "Feedback kamu sedang kami simpan",
                        allowOutsideClick: false,
                        didOpen : () => {
                            Swal.showLoading()
                        },
                    });
                    jQuery.ajax({
                        type: 'POST',
                        url: '{{ route('email.feedback') }}',
                        data: {
                            'name' : inputName.val(),
                            'email' : inputEmail.val(),
                            'pesan' : inputPesan.val(),
                        },
                        success: function (data) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: `Feedback terkirim!`,
                                type: "success",
                            }).then(() => {
                               form.trigger('reset');
                            })
                        },

                    });
                }
            });
        });
    </script>

@endsection
