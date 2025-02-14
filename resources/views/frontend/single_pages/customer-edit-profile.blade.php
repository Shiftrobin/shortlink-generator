@extends('frontend.layouts.master')
@section('content')

<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">Edit Profile</a></li>
             </ul>
         </div>
     </div>
     <section class="section--about ps-page--business">
         <div class="container">
              <div class="row">
                <div style="margin-top:30px;"  class="col-sm-3">
                   <ul class="prof">
                        <li class="{{(@$customer_account_title=='profile_title')?'active_account':''}}"><a href="{{route('dashboard')}}">My Profile</a></li>
                        {{-- <li class="{{(@$customer_account_title=='shopping_type_title')?'active_account':''}}"><a href="{{route('customer.shopping_type')}}">Shopping Type</a></li> --}}
                        <li class="{{(@$customer_account_title=='password_change_title')?'active_account':''}}"><a href="{{route('customer.passowrd.change')}}">Password Change</a></li>
                        {{-- <li class="{{(@$customer_account_title=='order_list_title')?'active_account':''}}"><a href="{{route('customer.order.list')}}">Order List</a></li> --}}
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div style="margin-top:30px;" class="col-sm-9">
                    <h3>Edit Profile</h3>
                    <form method="post" action="{{route('customer.update.profile')}}" id="customerEditForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">                           
                         
                            <div class="col-md-4 form-group--block">
                                <label>Phone Number <span style="color:red;font-weight: bold;">*</span></label>
                                <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                                <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                            </div>
                            <div class="col-md-4 form-group--block">
                                <label>Email <span style="color:red;font-weight: bold;">*</span></label>
                                <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                                <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                            </div>
                            <div class="col-md-4 form-group--block">
                                <label>Father's Name</label>
                                <input type="text" name="fathers_name" value="{{$editData->fathers_name}}" class="form-control">
                                <font color="red">{{($errors->has('fathers_name'))?($errors->first('fathers_name')):''}}</font>
                            </div>  


                            <div class="col-md-4 form-group--block">
                                <label>Mother's Name</label>
                                <input type="text" name="mothers_name" value="{{$editData->mothers_name}}" class="form-control">
                                <font color="red">{{($errors->has('mothers_name'))?($errors->first('mothers_name')):''}}</font>
                            </div>  
                            <div class="col-md-4 form-group--block">
                                <label>Blood Group</label>
                                <input type="text" name="blood_group" value="{{$editData->blood_group}}" class="form-control">
                                <font color="red">{{($errors->has('blood_group'))?($errors->first('blood_group')):''}}</font>
                            </div>  
                            <div class="col-md-4 form-group--block">
                                <label>Profession</label>
                                <input type="text" name="profession" value="{{$editData->profession}}" class="form-control">
                                <font color="red">{{($errors->has('profession'))?($errors->first('profession')):''}}</font>
                            </div>

                            <div class="col-md-4 form-group--block">
                                <label>Other Expertise</label>
                                <input type="text" name="other_expertise" value="{{$editData->other_expertise}}" class="form-control">
                                <font color="red">{{($errors->has('other_expertise'))?($errors->first('other_expertise')):''}}</font>
                            </div> 
                            <div class="col-md-4 form-group--block">
                                <label>Country <span style="color:red;font-weight: bold;">*</span></label>
                                <input type="text" name="country" value="{{$editData->country}}" class="form-control">
                                <font color="red">{{($errors->has('country'))?($errors->first('country')):''}}</font>
                            </div> 
                            <div class="col-md-4 form-group--block">
                                <label>Division<span style="color:red;font-weight: bold;">*</span></label>
                                <input type="text" name="division" value="{{$editData->division}}" class="form-control">
                                <font color="red">{{($errors->has('division'))?($errors->first('division')):''}}</font>
                            </div>

                            <div class="col-md-2 form-group--block">
                                <label>District<span style="color:red;font-weight: bold;">*</span></label>
                                <input type="text" name="district" value="{{$editData->district}}" class="form-control">
                                <font color="red">{{($errors->has('district'))?($errors->first('district')):''}}</font>
                            </div>    
                            <div class="col-md-6 form-group--block">
                                <label>Address <span style="color:red;font-weight: bold;">*</span></label>
                                <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                                <font color="red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
                            </div> 
                            
                            <div class="col-md-3 form-group--block">
                                <label class="control-label">Photo<span style="color:red;font-weight:bold;">*</span></label>
                                <input type="file" name="image" style="font-size:17px"  class="form-control" id="image">
                            </div>
                            <div class="col-md-1 form-group--block">
                                <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width:70px;height: 75px;border:1px solid #000; margin-top:8px;">
                            </div>


                            <div class="col-md-12" style="padding-top:15px;">
                                <button type="submit" class="custom_btn" style="border:1px solid;">Update Profile</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
         </div>
     </section>
 </main>

 <script type="text/javascript">
    $(document).ready(function () {
        $('#customerEditForm').validate({
            errorClass:'text-danger',
            validClass:'text-success',
            rules: {             
                country: {
                    required: true,
                },               
                mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                address: {
                    required: true,
                },
                division: {
                    required: true,
                },
                district: {
                    required: true,
                }  
            },
            messages: {
                email : {
                    country : 'Please enter country',                    
                },  
                mobile : {
                    required : 'Please enter mobile',                   
                },  
                email : {
                    required : 'Please enter email address',
                    email : 'Please enter a <em>valid</em> email address',
                },      
                address : {
                    required : 'Please enter address',                   
                },  
                division: {
                    required : 'Please enter division',     
                },
                district: {
                    required : 'Please enter district',     
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