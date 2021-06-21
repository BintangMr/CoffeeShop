<footer class="contacts_wrap scheme_original">
    <div class="contacts_wrap_inner" style="background-image: url({{ asset("asset/img/contact_us.jpg") }})">
        <div class="content_wrap">
            <div class="contacts_address">
                <address class="address_right">
                    Telepon : +62 858 7287 1776 <br>
                </address>
                <address class="address_left">
                    Cipasung, Darma, Kabupaten Kuningan, Jawa Barat 45562
                </address>
            </div>
            <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_medium">
                @include('components.base.social')
            </div>
        </div>
        <div class="content_wrap">
            <div class="copyright_text">
                <a href="#" class="custom-footer">Liberica Cipasung</a> ©{{ \Carbon\Carbon::now()->format('Y') }} All Rights Reserved
            </div>
        </div>
    </div>
</footer>

@push('css')
    <style>

    </style>
@endpush
