@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
     {{-- <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Contact Us</a></li>
             </ul>
         </div>
     </div> --}}
     <section class="section--about ps-page--business">
         <div class="banner--block"><img class="banner-img" src="{{asset('public/upload/banner_images/'.$banner->image)}}" alt></div>
         <div class="container">
             <div class="contact__content" style="padding-top: 30px;">
                 <div class="row">
                     <div class="col-12 col-lg-7">
                         <div class="row">
                             <div class="col-12">

                                 <div class="contact__map mb-5">

                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.499088349656!2d90.02229017532758!3d23.478526378856746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375587ffc879f657%3A0x53537867d27a4dbb!2z4Kas4Ka_4Ka24KeN4KasIOCmnOCmvuCmleCnh-CmsCDgpq7gpp7gp43gppzgpr_gprIg4Ka44Kaw4KaV4Ka-4Kaw4Ka_IOCmieCmmuCnjeCmmiDgpqzgpr_gpqbgp43gpq_gpr7gprLgpq_gprw!5e0!3m2!1sbn!2sbd!4v1692898784411!5m2!1sbn!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                                </div>

                            </div>

                             <div class="col-12 col-md-6">
                                 <!--<h3 class="contact__title">Contact Info</h3>-->
                                 <!--<div class="contact__info">-->
                                 <!--    {{-- <p> <span>Hotline Free: </span>(7:00 - 21:30)</p> --}}-->
                                 <!--    <p class="contact__info__phone">{{@$contact->mobile_no}} <br> +88 – 01409 964 999</p>-->
                                 <!--    <p> <span>Head office: </span>{{@$contact->address}}</p>-->
                                 <!--    <p> <span>Email us: </span>{{@$contact->email}}</p>-->
                                 <!--</div>-->
                             </div>
                             <div class="col-12 col-md-6">
                                 <!--<h3 class="contact__title">Follow Us</h3>-->
                                 <!--<div class="contact__social">-->
                                 <!--    <a class="icon_social facebook" href="{{@$contact->facebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a>-->
                                 <!--    {{-- <a class="icon_social twitter" href="{{@$contact->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>-->
                                 <!--    <a class="icon_social youtube" href="{{@$contact->linkedin}}" target="_blank"><i class="fa fa-linkedin-square"></i></a>-->
                                 <!--    <a class="icon_social twitter" href="{{@$contact->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a> --}}-->
                                 <!--</div>-->
                             </div>

                         </div>
                     </div>
                     <div class="col-12 col-lg-5">
                         <form method="POST" action="{{route('contatct.store')}}" id="contactForm">
                            @csrf
                             <div class="contact__form">
                                 <h3 class="contact__title">Contact Form</h3>
                                 <p>Please send us a message by filling out the form below and we will get back with you shortly.</p>
                                 <div class="form-row">
                                     <div class="col-12 form-group--block">
                                         <label>Name: <span>*</span></label>
                                         <input name="name" class="form-control" type="text" required>
                                     </div>
                                     <div class="col-12 form-group--block">
                                         <label>Email: <span>*</span></label>
                                         <input name="email" class="form-control" type="email" required>
                                     </div>
                                     <div class="col-12 form-group--block">
                                         <label>Subject: <span>*</span> </label>
                                         <input name="subject" class="form-control" type="text" required>
                                     </div>
                                     <div class="col-12 form-group--block">
                                         <label>Message: <span>*</span></label>
                                         <textarea name="msg" class="form-control" required></textarea>
                                     </div>
                                 </div>
                             </div>
                             <button type="submit" class="btn ps-button contact__send">Send Message</button>
                         </form>

                         <br><br>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </main>

 <script>
    $(function() {
        $("#contactForm").validate({
            errorClass:'text-danger',
            validClass:'text-success',
            rules: {
                name: {
                    required: true,
                    maxlength : 15,
                    minlength : 2,
                    lettersonly: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                subject: {
                    required: true,
                },
                msg: {
                    required: true,
                }
            },
            messages: {
                name : {
                    required : 'First name is required',
                    maxlength : 'Maximum 15 character is acceptable',
                    minlength : 'Minimum 2 character is acceptable',
                    lettersonly : 'Only Alpha is acceptable',
                },
                email : {
                    required : 'Please enter email address',
                    email : 'Please enter a <em>valid</em> email address',
                }
            }
        });

        $.validator.addMethod("pwcheck", function(value) {
           return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
               && /[a-z]/.test(value) // has a lowercase letter
               && /\d/.test(value) // has a digit
        });
    });
</script>
@endsection
