@extends('frontend.layouts.master')
@section('content')

<main class="no-main">
     <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">My Profile</a></li>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="img-circle text-center">
                                <img src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/no_image.png')}}" style="width: 130px;height: 140px;border-radius: 50px;">
                            </div> 
                            <h3 class="text-center pt-4">{{$user->name}}</h3>                          
                            <table class="table table-bordered">
                                <tbody> 
                                    <tr>
                                        <td>ID Card</td>   
                                        <td> <a href="{{ route('customer.card',$user->id) }}"><i class="fa fa-download text-danger"></i></a></td>
                                    </tr>    
                                    <tr>
                                        <td>Member ID</td>
                                        <td>{{$user->member_id}}</td>
                                    </tr>
                                     <tr>
                                        <td>Login Username</td>
                                        <td>{{$user->username}}</td>
                                    </tr>  
                                    <tr>
                                        <td>Full Name</td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                    </tr>                          


                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{$user->mobile}}</td>
                                    </tr>                                   
                                    <tr>
                                        <td>Father's Name</td>
                                        <td>{{$user->fathers_name}}</td>
                                    </tr>

                                    <tr>
                                        <td>Mother's Name</td>
                                        <td>{{$user->mothers_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date Of Birth</td>
                                        <td>{{$user->date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <td>NID</td>
                                        <td>{{$user->nid}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{$user->gender}}</td>
                                    </tr>

                                    <tr>
                                        <td>Blood Group</td>
                                        <td>{{$user->blood_group}}</td>
                                    </tr>
                                    <tr>
                                        <td>Profession</td>
                                        <td>{{$user->profession}}</td>
                                    </tr>
                                    <tr>
                                        <td>Other Expertise</td>
                                        <td>{{$user->other_expertise}}</td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>{{$user->country}}</td>
                                    </tr>

                                    <tr>
                                        <td>Division</td>
                                        <td>{{$user->division}}</td>
                                    </tr>
                                    <tr>
                                        <td> Membership Type</td>
                                        <td>{{$user->membership_type}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{$user->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @if ($user->status == '1')
                                                 <span style="color:green;font-weight:bold;">{{'Active'}}</span>     
                                            @else
                                                   <span style="color:red;font-weight:bold;">{{'Inactive'}}</span> 
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <a class="custom_btn" href="{{route('customer.edit.profile')}}">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
         </div>
     </section>
 </main>
@endsection