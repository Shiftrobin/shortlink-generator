@extends('backend.layouts.member-master')
@section('content')
    <style type="text/css">
        h4 {
            padding-top: 10px;
        }

        .card_body {
            border-radius: 10px;
            text-align: center;
        }

        .card-clock {
            background: transparent;
            border: none;
        }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Profile | <a href="{{ route('dashboard') }}"
                                class="btn btn-warning">Back to profile</a> </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#about" data-toggle="tab">
                                            Update Contact Information
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">

                                @if (Auth::user()->status == 1)
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="about">
                                            <form class="form-horizontal" method="post"
                                                action="{{ route('customer.update.profile') }}" id="memberEditForm"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Photo</label>
                                                    <div class="col-sm-5">
                                                        <label class="text-danger">Image size should be 250px X 250px for
                                                            best view</label>
                                                        <input type="file" name="image" style="font-size:17px"
                                                            class="form-control" id="image">
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <img id="showImage"
                                                            src="{{ !empty($editData->image) ? url('public/upload/member_images/' . $editData->image) : url('public/upload/no_image.png') }}"
                                                            style="width:70px;height: 75px;border:1px solid #000;" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name='name' value="{{ $editData->name }}"
                                                            class="form-control" placeholder="Full Name">
                                                        <font color="red">
                                                            {{ $errors->has('name') ? $errors->first('name') : '' }}</font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Designation</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name='profession'
                                                            value="{{ $editData->profession }}" class="form-control"
                                                            placeholder="Designation">
                                                        <font color="red">
                                                            {{ $errors->has('profession') ? $errors->first('profession') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Country</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name='country'
                                                            value="{{ $editData->country }}" class="form-control"
                                                            placeholder="Country">
                                                        <font color="red">
                                                            {{ $errors->has('country') ? $errors->first('country') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name='address' placeholder="Address"> {{ $editData->address }} </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Email<span
                                                            style="color:red;font-weight: bold;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $editData->email }}" placeholder="Email">
                                                        <font color="red">
                                                            {{ $errors->has('email') ? $errors->first('email') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Mobile<span
                                                            style="color:red;font-weight: bold;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="mobile"
                                                            value="{{ $editData->mobile }}" class="form-control"
                                                            placeholder="Mobile Number">
                                                        <font color="red">
                                                            {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Mobile2</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="mobile2"
                                                            value="{{ $editData->mobile2 }}" class="form-control"
                                                            placeholder="Additional Mobile Number">
                                                        <font color="red">
                                                            {{ $errors->has('mobile2') ? $errors->first('mobile2') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Facebook
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="facebook_link"
                                                            value="{{ $editData->facebook_link }}" class="form-control"
                                                            placeholder="Facebook Link">
                                                        <font color="red">
                                                            {{ $errors->has('facebook_link') ? $errors->first('facebook_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Twitter
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="twitter_link"
                                                            value="{{ $editData->twitter_link }}" class="form-control"
                                                            placeholder="Twitter Link">
                                                        <font color="red">
                                                            {{ $errors->has('twitter_link') ? $errors->first('twitter_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Whatsapp
                                                        Phone Number(No space or hypen)</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="whatsapp_link"
                                                            value="{{ $editData->whatsapp_link }}" class="form-control"
                                                            placeholder="Whatsapp Phone Number(No space or hypen)">
                                                        <font color="red">
                                                            {{ $errors->has('whatsapp_link') ? $errors->first('whatsapp_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Linkedin
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="linkedin_link"
                                                            value="{{ $editData->linkedin_link }}" class="form-control"
                                                            placeholder="Linkedin Link">
                                                        <font color="red">
                                                            {{ $errors->has('linkedin_link') ? $errors->first('linkedin_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Instagram
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="instagram_link"
                                                            value="{{ $editData->instagram_link }}" class="form-control"
                                                            placeholder="Instagram Link">
                                                        <font color="red">
                                                            {{ $errors->has('instagram_link') ? $errors->first('instagram_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Youtube
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="youtube_link"
                                                            value="{{ $editData->youtube_link }}" class="form-control"
                                                            placeholder="Youtube Link">
                                                        <font color="red">
                                                            {{ $errors->has('youtube_link') ? $errors->first('youtube_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Messenger
                                                        Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="messenger_link"
                                                            value="{{ $editData->messenger_link }}" class="form-control"
                                                            placeholder="Messenger Link">
                                                        <font color="red">
                                                            {{ $errors->has('messenger_link') ? $errors->first('messenger_link') : '' }}
                                                        </font>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Company
                                                    Logo</label>
                                                <div class="col-sm-5">
                                                    <input type="file" name="company_logo" style="font-size:17px"
                                                        class="form-control" id="image2">
                                                </div>
                                                <div class="col-sm-5">
                                                    <img id="showImage2"
                                                        src="{{ !empty($editData->company_logo) ? url('public/upload/member_images/' . $editData->company_logo) : url('public/upload/no_image.png') }}"
                                                        style="width:70px;height: 75px;border:1px solid #000;" />
                                                </div>
                                            </div> --}}
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->

                                    </div>
                                    <!-- /.tab-content -->
                                @else
                                    <p class="text-danger h5 fw-bold">
                                        Your account is not active.
                                        <br>
                                        Please contact with the Web Administrator for account activation.
                                        <br>
                                        Email: shefat@aimseducation.co.uk
                                    </p>
                                @endif

                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="{{ !empty(Auth::user()->image) ? url('public/upload/member_images/' . Auth::user()->image) : url('public/frontend/img/logo.png') }}"
                                        class="img-circle elevation-2" alt="User Image" width="128" height="128">
                                </div>

                                <h3 class="profile-username text-center">{{ Auth::user()->name ?? '' }}</h3>

                                <p class="text-muted text-center">{{ Auth::user()->profession ?? '' }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <a href="tel:{{ Auth::user()->mobile ?? '' }}" target="_blank"
                                            class="btn btn-success btn-block"><b>
                                                <i class="fas fa-mobile-alt"></i>
                                                Phone</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->facebook_link ?? '' }}" target="_blank"
                                            class="btn btn-primary btn-block"><b>
                                                <i class="fab fa-facebook-square"></i> Facebook</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->twitter_link ?? '' }}" target="_blank"
                                            class="btn btn-dark btn-block"><b>
                                                <i class="fab fa-twitter-square"></i> Twitter</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->whatsapp_link ?? '' }}" target="_blank"
                                            class="btn btn-success btn-block"><b>
                                                <i class="fab fa-whatsapp-square"></i> Whatsapp</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->linkedin_link ?? '' }}" target="_blank"
                                            class="btn btn-info btn-block"><b>
                                                <i class="fab fa-linkedin"></i> Linkedin</b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->instagram_link ?? '' }}" target="_blank"
                                            class="btn btn-danger btn-block"><b>
                                                <i class="fab fa-instagram-square"></i> Instagram </b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->youtube_link ?? '' }}" target="_blank"
                                            class="btn btn-danger btn-block"><b>
                                                <i class="fab fa-youtube"></i> Youtube </b></a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ Auth::user()->messenger_Link ?? '' }}" target="_blank"
                                            class="btn btn-primary btn-block"><b>
                                                <i class="fab fa-facebook-messenger"></i> Messenger </b></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Contact Information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Username (Can not be changed) </strong>
                                <p class="text-muted h5">{{ Auth::user()->username ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Full Name </strong>
                                <p class="text-muted h5">{{ Auth::user()->name ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"> Designation </i>
                                </strong>
                                <p class="text-muted h5">
                                    {{ Auth::user()->profession ?? '' }}
                                </p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Email </strong>
                                <p class="text-muted h5">{{ Auth::user()->email ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Mobile Number </strong>
                                <p class="text-muted h5">{{ Auth::user()->mobile ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Alternative Mobile Number </strong>
                                <p class="text-muted h5">{{ Auth::user()->mobile2 ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Country </strong>
                                <p class="text-muted h5">{{ Auth::user()->country ?? '' }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Address </strong>
                                <p class="text-muted h5">{{ Auth::user()->address ?? '' }}</p>
                                <hr>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#memberEditForm').validate({
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    mobile: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    mobile: {
                        required: 'Please enter mobile number',
                    },
                    email: {
                        required: 'Please enter email address',
                        email: 'Please enter a <em>valid</em> email address',
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
