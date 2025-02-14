<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>::.. Short Link Generator Application Login ..::</title>
        <link rel="icon" type="image/x-icon" href="{{asset('public/frontend/login/Icone.png')}}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{asset('public/frontend/login/bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/frontend/login/dist/css/AdminLTE.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('public/frontend/login/plugins/iCheck/square/blue.css')}}">
        <style>
            .login-box-body{
                border-radius: 10px;
                box-shadow: 1px 1px 8px;
            }
        </style>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-box-body">
                <div class="login-logo">
                   <img src="{{asset('public/frontend/img/aims.png')}}" style="width: 50%">

                </div><!-- /.login-logo -->
                <h3 class="login-box-msg" style="font-weight:bold;">Short Link Generator Application</h3>
                <h3 class="login-box-msg" style="font-weight:bold;">::.. Administrator Login ..::</h3>
                    <!--Error_message-->
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
                    <!--Error_message-->

                    <form method="POST" action="{{route('login')}}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{ old('username') }}">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"></div>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Log In">
                            </div><!-- /.col -->
                        </div>
                    </form>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->    <!-- jQuery 2.1.4 -->
        <script src="{{asset('public/frontend/login/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>    <!-- Bootstrap 3.3.5 -->
        <script src="{{asset('public/frontend/login/bootstrap/js/bootstrap.min.js')}}"></script>    <!-- iCheck -->
        <script src="{{asset('public/frontend/login/plugins/iCheck/icheck.min.js')}}"></script>

    </body>
</html>
