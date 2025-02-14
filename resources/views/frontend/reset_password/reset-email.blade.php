@extends('frontend.vcard.layout.master')
@section('content')
    <main class="main-box">

        <section class="container mt-5">
            <img class="d-block mx-auto mb-4" src="{{ asset('public/frontend/img/logo.jpg') }}" alt="" />
            <h1 class="h2 fw-bold text-center pb-3 text-info">Reset your password</h1>
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              @foreach($errors->all() as $error)
              <strong>{{$error}}</strong><br/>
              @endforeach
            </div>
            @endif
            @if(Session::get('message'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>{{Session::get('message')}}</strong>
            </div>
            @endif
        </section>

        <section class="container">
            <div class="px-2 py-2 mb-5 text-center">
                <div class="row">
                    <div class="col-lg-6 mx-auto mt-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h2 class="card-title fw-bold h2">Use your email to reset your password</h2>
                            </div>
                            <form action="{{route('check.email')}}" method="POST" id="resetEmail">
                                @csrf
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group input-group-lg">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter your email address" required>
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-info btn-flat">Submit</button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#resetEmail').validate({
                errorClass:'text-danger',
                validClass:'text-success',
                rules: {
                    email: {
                        email: true,
                        required: true,
                    }
                },
                messages: {
                    email : {
                        required : 'Please enter your email address',
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
      </script>
    @endsection

