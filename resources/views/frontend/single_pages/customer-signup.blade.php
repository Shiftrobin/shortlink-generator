@extends('frontend.layouts.master')
@section('content')
    <main class="no-main">
        {{-- <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="{{url('')}}">Home</a></li>
                <li><a href="javascript:void(0);">নিবন্ধন ফরম </a></li>
            </ul>
        </div>
    </div> --}}
        <section class="section--login">
            <div class="container pt-5">

                <center>
                    <span>
                        <a class="logo pt-3 pb-4" href="#"><img src="{{ asset('public/frontend/img/regpage.jpg') }}"
                                style="width:250px;height:auto;"></a>
                    </span>
                </center>
                <br />

                <h1 style="text-align: center;color:green; font-weight:bold;font-size:20px;" class="mb-40"> নিবন্ধন ফরম </h1>
                <form method="POST" action="{{ url('/pay') }}" id="customerSignupForm" enctype="multipart/form-data">
                    <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                    <div class="form-row">
                        {{--
                    <div class="col-md-5" style="margin-bottom:10px">
                        <label class="control-label">নামের প্রথম অংশ (ইংরেজিতে) </label>
                        <input type="text" name="first_name" class="form-control" style="font-size:17px" required>
                        <font style="color: red;">{{($errors->has('first_name'))?($errors->first('first_name')):''}}</font>
                    </div>
                    --}}

                        <div class="col-md-4" style="margin-bottom:10px">
                            <label class="control-label">পুরো নাম (বাংলায়) </label>
                            <input type="text" name="name" class="form-control" style="font-size:17px" required>
                            <font style="color: red;">{{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                        </div>

                        <div class="col-md-4" style="margin-bottom:10px">
                            <label class="control-label"> ডাকনাম (ইংরেজিতে) </label>
                            <input type="text" name="last_name" class="form-control" style="font-size:17px" required>
                            <font style="color: red;">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}
                            </font>
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">পাসপোর্ট সাইজ ছবি </label>
                            <input type="file" name="image" style="font-size:17px" class="form-control" id="image"
                                required>
                        </div>
                        <div class="col-md-1">
                            <img id="showImage"
                                src="{{ !empty($editData->image) ? url('public/upload/user_images/' . $editData->image) : url('public/upload/no_image.png') }}"
                                style="width: 80px;height: 85px;border:1px solid #000;">
                        </div>

                        <div class="col-md-4" style="margin-bottom:10px">
                            <label class="control-label">ই-মেইল ঠিকানা (ইংরেজিতে) </label>
                            <input type="email" name="email" id="email" class="form-control" style="font-size:17px"
                                required>
                            <font style="color: red;">{{ $errors->has('email') ? $errors->first('email') : '' }}</font>
                        </div>

                        <div class="col-md-4" style="margin-bottom:10px">
                            <label class="control-label"> মোবাইল নম্বর (ইংরেজিতে)</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" style="font-size:17px">
                            <font style="color: red;">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</font>
                        </div>

                        {{-- <div class="col-md-4" style="margin-bottom:10px">
                        <label class="control-label">Date Of Birth (Format: DD/MM/YY) <span style="color:red;font-weight:bold;">*</span></label>
                        <input type="text" name="date_of_birth" class="form-control" style="font-size:17px" placeholder="DD/MM/YY">
                    </div> --}}
                        <div class="col-md-4" style="margin-bottom:10px">
                            <label class="control-label">
                                জন্ম নিবন্ধন/জাতীয় পরিচয়পত্র/পাসপোর্ট নম্বর
                            </label>
                            <input type="text" name="nid" class="form-control" style="font-size:17px">
                            <font style="color: red;">{{ $errors->has('nid') ? $errors->first('nid') : '' }}</font>
                        </div>
                        {{-- <div class="col-md-2">
                        <label for="gender">Gender <span style="color:red;font-weight:bold;">*</span></label>
                        <select name="gender" id="gender" style="font-size:17px" class="form-control">
                          <option value="">Select Any</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Transgender">Transgender</option>
                        </select>
                    </div> --}}

                        <div class="col-md-8" style="margin-bottom:10px">
                            <label class="control-label">
                                পেশা ও কর্মস্থল (বাংলায়)

                            </label>
                            <input type="text" name="profession" class="form-control" style="font-size:17px" required>
                            <font style="color: red;">{{ $errors->has('profession') ? $errors->first('profession') : '' }}
                            </font>
                        </div>

                        {{-- <div class="col-md-2">
                        <label for="blood_group"> রক্তের গ্রুপ </label>
                        <select name="blood_group" id="blood_group" style="font-size:17px" class="form-control">
                          <option value="">Select Any</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                        </select>
                    </div> --}}
                        <div class="col-md-2">
                            <label for="blood_group"> রক্তের গ্রুপ

                            </label>
                            <select name="blood_group" id="blood_group" style="font-size:17px" class="form-control"
                                required>
                                <option value="">Select Any</option>
                                <option value="এ+">এ+</option>
                                <option value="এ-">এ-</option>
                                <option value="বি+">বি+</option>
                                <option value="বি-">বি-</option>
                                <option value="এবি+">এবি+</option>
                                <option value="এবি-">এবি-</option>
                                <option value="ও+">ও+</option>
                                <option value="ও-">ও-</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="tshirt">পোলো টি-শার্ট সাইজ

                            </label>
                            <select name="tshirt" id="tshirt" style="font-size:17px" class="form-control">
                                <option value="">Select Any</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>

                        {{-- <div class="col-md-4">
                        <label for="education_qualification">Education Qualification</label>
                        <select name="education_qualification" id="education_qualification" style="font-size:17px" class="form-control">
                          <option value="">Select Any</option>
                          <option value="SSC">SSC</option>
                          <option value="HSC">HSC</option>
                          <option value="Graduate">Graduate</option>
                          <option value="Post Graduate">Post Graduate</option>
                          <option value="Others">Others</option>
                        </select>
                    </div> --}}

                        {{-- <div class="col-md-4" style="margin-bottom:10px">
                        <label class="control-label">Other Expertise</label>
                        <input type="text" name="other_expertise" class="form-control" style="font-size:17px">
                        <font style="color: red;">{{($errors->has('other_expertise'))?($errors->first('other_expertise')):''}}</font>
                    </div> --}}

                        {{-- <div class="col-md-4" style="margin-bottom:10px">
                        <label class="control-label">Country <span style="color:red;font-weight:bold;">*</span></label>
                        <input type="text" name="country" class="form-control" style="font-size:17px">
                        <font style="color: red;">{{($errors->has('country'))?($errors->first('country')):''}}</font>
                    </div>
                    <div class="col-md-4" style="margin-bottom:10px">
                        <label class="control-label">Division <span style="color:red;font-weight:bold;">*</span></label>
                        <input type="text" name="division" class="form-control" style="font-size:17px">
                        <font style="color: red;">{{($errors->has('division'))?($errors->first('division')):''}}</font>
                    </div>
                    <div class="col-md-4" style="margin-bottom:10px">
                        <label class="control-label">District <span style="color:red;font-weight:bold;">*</span></label>
                        <input type="text" name="district" class="form-control" style="font-size:17px">
                        <font style="color: red;">{{($errors->has('district'))?($errors->first('district')):''}}</font>
                    </div> --}}
                        <div class="col-md-12" style="margin-bottom:10px">
                            <label class="control-label">স্থায়ী ঠিকানা (বাংলায়)

                                {{-- <input type="text" name="address" class="form-control" style="font-size:17px"> --}}
                                <textarea name="address" class="form-control" id="" cols="123" rows="4" style="font-size:17px"
                                    required></textarea>
                        </div>
                        {{-- <div class="col-md-2">
                        <label for="membership_type">Membership Type <span style="color:red;font-weight:bold;">*</span></label>
                        <select name="membership_type" id="membership_type" style="font-size:17px" class="form-control">
                          <option value="">Select Any</option>
                          <option value="Student">Student</option>
                          <option value="Business">Business</option>
                          <option value="Service">Service</option>
                          <option value="Unemployed">Unemployed</option>
                          <option value="Retired">Retired</option>
                          <option value="House Wife">House Wife</option>
                          <option value="Farmer">Farmer</option>
                        </select>
                    </div> --}}

                        <div class="col-md-2">
                            <label for="batch">এসএসসি ব্যাচ</label>
                            <select name="batch" id="batch" style="font-size:17px" class="form-control" required>
                                <option value="">Select Any</option>
                                <option value="২০২৩">২০২৩</option>
                                <option value="২০২২">২০২২</option>
                                <option value="২০২১">২০২১</option>
                                <option value="২০২০">২০২০</option>
                                <option value="২০১৯">২০১৯</option>
                                <option value="২০১৮">২০১৮</option>
                                <option value="২০১৭">২০১৭</option>
                                <option value="২০১৬">২০১৬</option>
                                <option value="২০১৫">২০১৫</option>
                                <option value="২০১৪">২০১৪</option>
                                <option value="২০১৩">২০১৩</option>
                                <option value="২০১২">২০১২</option>
                                <option value="২০১১">২০১১</option>
                                <option value="২০১০">২০১০</option>
                                <option value="২০০৯">২০০৯</option>
                                <option value="২০০৮">২০০৮</option>
                                <option value="২০০৭">২০০৭</option>
                                <option value="২০০৬">২০০৬</option>
                                <option value="২০০৫">২০০৫</option>
                                <option value="২০০৪">২০০৪</option>
                                <option value="২০০৩">২০০৩</option>
                                <option value="২০০২">২০০২</option>
                                <option value="২০০১">২০০১</option>
                                <option value="২০০০">২০০০</option>
                                <option value="১৯৯৯">১৯৯৯</option>
                                <option value="১৯৯৮">১৯৯৮</option>
                                <option value="১৯৯৭">১৯৯৭</option>
                                <option value="১৯৯৬">১৯৯৬</option>
                                <option value="১৯৯৫">১৯৯৫</option>
                                <option value="১৯৯৪">১৯৯৪</option>
                                <option value="১৯৯৩">১৯৯৩</option>
                                <option value="১৯৯২">১৯৯২</option>
                                <option value="১৯৯১">১৯৯১</option>
                                <option value="১৯৯০">১৯৯০</option>
                                <option value="১৯৮৯">১৯৮৯</option>
                                <option value="১৯৮৮">১৯৮৮</option>
                                <option value="১৯৮৭">১৯৮৭</option>
                                <option value="১৯৮৬">১৯৮৬</option>
                            </select>
                        </div>


                        {{-- //captcha  --}}
                        {{--
                    <div class="col-md-3">
                       <div class="captcha" style="margin-top:30px">
                            <span>{!! captcha_img('math') !!}</span>
                            <button type="button" class="btn btn-danger reload" id="reload">
                                    &#x21bb;
                            </button>
                       </div>
                    </div>
                    <div class="col-md-3" style="margin-top:30px">
                        <input type="text"  class="form-control" name="captcha" placeholder="Enter Captcha" style="font-size:17px" required>
                        <font style="color: red;">{{($errors->has('captcha'))?($errors->first('captcha')):''}}</font>
                    </div> --}}

                        {{-- <div class="col-md-6">
                        <label for="total_amount"> Payment <span style="color:red;font-weight:bold;">*</span></label>
                        <select name="total_amount" id="total_amount" style="font-size:17px" class="form-control">
                          <option value="">Select Any One</option>
                          <option value="100">Registration (100 Tk)</option>
                          <option value="150">Registration & One Month Subscription (150 Tk)</option>
                          <option value="350">Registration & Six Month Subscription (350 Tk)</option>
                          <option value="600">Registration & One Year Subscription (600 Tk)</option>
                        </select>
                    </div> --}}
                        <div class="col-md-6">
                            <label for="total_amount">নিবন্ধন ফি ১,০০০ টাকা </label>
                            <input type="text" name="total_amount" id="total_amount" class="form-control"
                                value="10" style="font-size:17px" readonly>
                        </div>

                        <div class="col-md-4" style="margin-top:30px">
                            <input type="checkbox" id="term" name="term" value="1" required>
                            <label for="term">
                                I HAVE READ AND AGREE TO THE WEBSITE'S <a href="{{ route('frontend.terms-condition') }}"
                                    class="text-danger">TERMS AND CONDITIONS</a>, <a
                                    href="{{ route('frontend.privacy-policy') }}" class="text-danger">PRIVACY POLICY</a>
                                AND <a href="{{ route('frontend.help-faq') }}" class="text-danger">REFUND POLICY</a>.

                            </label>
                        </div>

                        <div class="col-md-3" style="margin-bottom:10px">
                            <button type="submit" class="btn  btn-login">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>


    {{-- <script>
    //captch
    $('#reload').click(function(){
    $.ajax({
        type:'GET',
        url:'reload-captcha',
        success:function(data){
            $(".captcha span").html(data.captcha)
        }
     });
    });
</script> --}}

    <script>
        $(function() {
            $("#customerSignupForm").validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    // first_name: {
                    //     required: true,
                    //     // maxlength : 10,
                    //     // minlength : 2,
                    //     // lettersonly: true,
                    // },
                    last_name: {
                        required: true,
                        // maxlength : 10,
                        // minlength : 2,
                        // lettersonly: true,
                    },
                    image: {
                        required: true,
                    },
                    date_of_birth: {
                        required: true,
                    },
                    nid: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    country: {
                        required: true,
                    },
                    division: {
                        required: true,
                    },
                    district: {
                        required: true,
                    },
                    membership_type: {
                        required: true,
                    },
                    mobile: {
                        required: true,
                    },
                    email: {
                        email: true,
                    },
                    username: {
                        required: true,
                        remote: {
                            url: "{{ route('customer.reg.username.check') }}",
                            type: "GET",
                            data: {
                                username: function() {
                                    return $('#username').val();
                                }
                            },
                        },
                    },
                    password: {
                        required: true,
                        pwcheck: true,
                        minlength: 8
                    },
                    password_confirmation: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    // first_name : {
                    //     required : 'First name is required',
                    //     // maxlength : 'Maximum 10 character is acceptable',
                    //     // minlength : 'Minimum 2 character is acceptable',
                    //     // lettersonly : 'Only Alpha is acceptable',
                    // },
                    last_name: {
                        required: 'Last name is required',
                        // maxlength : 'Maximum 10 character is acceptable',
                        // minlength : 'Minimum 2 character is acceptable',
                        // lettersonly : 'Only Alpha is acceptable',
                    },
                    image: {
                        required: 'Please Select your photo',
                    },
                    date_of_birth: {
                        required: 'Date of birth is required',
                    },
                    nid: {
                        required: 'Birth Certificate/NID/Passport Number is required',
                    },
                    gender: {
                        required: 'Gender is required',
                    },
                    country: {
                        required: 'Country is required',
                    },
                    division: {
                        required: 'Division is required',
                    },
                    district: {
                        required: 'District is required',
                    },
                    membership_type: {
                        required: 'Membership Type is required',
                    },
                    mobile: {
                        required: 'Please enter mobile no',
                    },
                    email: {
                        email: 'Please enter a <em>valid</em> email address',
                    },
                    username: {
                        required: 'Please enter username',
                        remote: 'Username is already exists!',
                    },
                    password: {
                        required: "Please enter password",
                        pwcheck: "First letter capital,One small letter & Minimum 1 letter numeric",
                        minlength: "Passwort will be min 8!"
                    },
                    password_confirmation: {
                        required: "Please enter confirm password",
                        equalTo: "Confirm password does not match!"
                    }
                }
            });

            $.validator.addMethod("pwcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    &&
                    /[a-z]/.test(value) // has a lowercase letter
                    &&
                    /\d/.test(value) // has a digit
            });
        });
    </script>
@endsection
