@extends('frontend.vcard.layout.member-profile-master')
@section('content')
    <main class="main-box">
        <section class="container">
            <div class="px-2 py-2 pt-3 text-center">
                <img class="d-block mx-auto mb-4 rounded-circle person-image"
                    src="{{ !empty($user->image) ? url('public/upload/member_images/' . $user->image) : url('public/frontend/img/logo.png') }}"
                    alt="" width="250" height="250" />
                <h1 class="h1 fw-bold person-name">{{ $user->name ?? '' }}</h1>
                <h2 class="h5 fw-bold designation">{{ $user->profession ?? '' }}</h2>
                <div class="col-lg-12 mx-auto mt-4">
                    <div class="d-flex gap-3 justify-content-center">

                        {{-- <a href="{{ url('/vcfdownload', $user->id ?? '') }}"
                            class="btn btn-primary rounded-pill save-contact-btn">SAVE
                            CONTACT <i class="bi bi-floppy"></i></a> --}}

                        <a id="download-vcard"
                            class="btn btn-primary rounded-pill save-contact-btn">SAVE
                            CONTACT <i class="bi bi-floppy"></i></a>
                        <script>
                            document.getElementById('download-vcard').addEventListener('click', function() {
                                window.location.href = "{{ route('vcf.download', $user->id) }}";
                            });
                        </script>

                        <button type="button" class="btn btn-danger rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">SHARE <i class="bi bi-share"></i></button>

                    </div>
                </div>
            </div>
        </section>

        <!-- SHARE Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title custom-primary-color fw-bold" id="exampleModalLabel">Share your Profile
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text custom-primary-color" id="basic-addon1"> <i
                                    class="bi bi-globe2"></i> </span>
                            <input type="text" class="form-control" value="{{ $actual_link ?? '' }}" id="webUrl" />
                        </div>
                        <div class="input-group mb-3">
                            <div id="toast" class="toast">Link Copied!</div>
                            <button class="btn btn-lg btn-primary" onclick="shareYourProfile()">Copy Link</button>
                        </div>
                        <div class="input-group mb-3">
                            {{ $qrCode ?? '' }}
                        </div>
                        <div class="input-group mb-3">
                            <a href="{{ url('/qrdownload', $user->id ?? '') }}" class="btn btn-lg btn-primary">Download
                                QR</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="container my-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="h-100 p-3 bg-light border rounded-3 location-email-box">
                        <address>
                            <img class="d-block mt-4" src="{{ asset('public/frontend/img/aims.png') }}"
                                alt="AIMS Education" />
                            {{-- <img class="d-block mt-4"
                                src="{{ !empty($user->image) ? url('public/upload/member_images/' . $user->image) : url('public/frontend/img/logo.png') }}"
                                alt="logo" width="64" height="64" /> --}}
                        </address>
                        <address class="ps-3 fs-5">
                            <i class="bi bi-geo-alt-fill location-email-icon"></i> {{ $user->address ?? '' }}
                        </address>
                        <address class="ps-3 fs-5">
                            <i class="bi bi-envelope-fill location-email-icon"></i> {{ $user->email ?? '' }}
                        </address>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid my-3 mx-1">
            <div class="row">

                <div id="toast2" class="toast2">Phone copied!</div>
                <div id="toast3" class="toast3">Link copied!</div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 border rounded-3 phone">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="tel:{{ $user->mobile ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-phone"></i> </a></span>
                            <span class="pe-4"> <a href="tel:{{ $user->mobile ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6" id="phone"> {{ $user->mobile ?? '' }}
                                </a></span>
                            <span class="ps-2 pe-2"> <a href="tel:{{ $user->mobile ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span> <i class="bi bi-copy text-white fs-6" onclick="copyPhoneNumber()"></i> </span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 facebook">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="{{ $user->facebook_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-facebook"></i>
                                </a></span>
                            <span class="pe-5"> <a href="{{ $user->facebook_link ?? '' }}"
                                    class="text-white text-decoration-none fs-6" id="facebook_com_url" target="_blank">
                                    Facebook
                                </a></span>
                            <span class="ps-5 pe-2"> <a href="{{ $user->facebook_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="facebookCom()"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 twitter">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="{{ $user->twitter_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-twitter-x"></i>
                                </a></span>
                            <span class="pe-5"> <a href="{{ $user->twitter_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6" id="x_com_url"> Twitter </a></span>
                            <span class="ps-5"> <a href="{{ $user->twitter_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i
                                        class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="xCom()"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 whatsapp">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a
                                    href="https://web.whatsapp.com/send?phone={{ $user->whatsapp_link ?? '' }}&text="
                                    target="_blank" class="text-white text-decoration-none fs-6"> <i
                                        class="bi bi-whatsapp"></i> </a></span>
                            <span class="pe-5"> <a
                                    href="https://web.whatsapp.com/send?phone={{ $user->whatsapp_link ?? '' }}&text="
                                    target="_blank" class="text-white text-decoration-none fs-6" id="whatsapp_com_url">
                                    Whatsapp
                                </a></span>
                            <span class="ps-5 pe-2"> <a
                                    href="https://web.whatsapp.com/send?phone={{ $user->whatsapp_link ?? '' }}&text="
                                    target="_blank" class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="whatsAppCom()"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 linkedin">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="{{ $user->twitter_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-linkedin"></i>
                                </a></span>
                            <span class="pe-5"> <a href="{{ $user->twitter_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6" id="linkedin_com_url"> Linkedin
                                </a></span>
                            <span class="ps-5 pe-2"> <a href="{{ $user->twitter_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="LinkedinCom()"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 instagram">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="{{ $user->instagram_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-instagram"></i>
                                </a></span>
                            <span class="pe-5"> <a href="{{ $user->instagram_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6" id="Instagram_com_url"> Instagram
                                </a></span>
                            <span class="ps-5 pe-2"> <a href="{{ $user->instagram_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="InstagramCom()"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 youtube">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="{{ $user->youtube_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-youtube"></i>
                                </a></span>
                            <span class="pe-5"> <a href="{{ $user->youtube_link ?? '' }}"
                                    class="text-white text-decoration-none fs-6" target="_blank" id="youtube_com_url">
                                    Youtube
                                </a></span>
                            <span class="ps-5 pe-2"> <a href="{{ $user->youtube_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="youtubeCom()"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="h-60 p-2 mt-2 border rounded-3 messenger">
                        <div class="d-flex justify-content-between">
                            <span class="pe-5"> <a href="{{ $user->messenger_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6"> <i class="bi bi-messenger"></i>
                                </a></span>
                            <span class="pe-5"> <a href="{{ $user->messenger_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6" id="messenger_com_url"> Messenger
                                </a></span>
                            <span class="ps-5 pe-2"> <a href="{{ $user->messenger_link ?? '' }}" target="_blank"
                                    class="text-white text-decoration-none fs-6">
                                    <i class="bi bi-box-arrow-up-right"></i></a> </span>
                            <span><i class="bi bi-copy text-white fs-6" onclick="messengerCom()"></i></span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endsection
