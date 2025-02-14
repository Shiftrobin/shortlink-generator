@extends('frontend.qrcode.layout.master')
@section('qrcode')

<main class="main-box">


<section class="container mt-5 mb-3">
	<div class="row">
		<div class="col-sm-12">
			   <img src="{{asset('public/frontend/img/aims.png')}}">
			   <h1 class="text-primary">QR Code Generator Application</h1>
		</div>	
	</div>	
</section>	

<section class="container my-3">
    <div class="row">
        <div class="col-sm-12">	
		<table id="example" class="table table-striped table-bordered" style="width:100%">
		        <thead>
		            <tr>
		                  <th>Id</th>
	                      <th>QR Code</th>
	                      <th>Portal Name</th>
	                      <th>Portal Link</th>                 
	                      <th>Note</th>
	                      <th>Status</th>
	                      <th>Action</th>
		            </tr>
		        </thead>
		        <tbody>
		         	 @foreach($allData as $key => $data)
	                    <tr class="{{$data->id}}">
	                      <td>{{$data->id}}</td>
	                      <td>
	                        <span> {!! QrCode::size(150)->generate($data->portal_link); !!} </span>   
	                        <br/>                                             
	                        <a class="btn btn-sm btn-success" href="{{ route('qrcode.download',$data->id) }}">
	                            <i class="fa fa-download"></i> Download QR Code 
	                        </a>
	                      </td>
	                      <td>{{$data->portal_name}}</td>
	                      <td>
	                          <div id="toast3" class="toast3">Link copied!</div>                          
	                          <a href="{{$data->portal_link}}" target="_blank"  id="x_com_url">
	                            <i class="fa fa-eye"></i>
	                            {{$data->portal_link}} 
	                          </a>
	                          
	                         <!--  <button type="button" class="btn btn-sm btn-success" onclick="xCom()">  
	                            <i class="fa fa-clone"><i/> Copy Link 
	                          </button> -->
	                      </td>                 
	                      <td>{!! $data->note  !!}</td>
	                      <td>
	                        @if($data->status=='1')	                            
	                              <span style="background-color:#16957C;padding:5px;color:white;">Active</span>	
	                        @elseif($data->status=='0')	                         
	                              <span style="background-color:#E33C2F;padding:5px;color:white;">Inactive</span>
	                        @endif
	                      </td>
	                      <td>
	                        <a class="btn btn-sm btn-success" href="{{ route('qrcode.download',$data->id) }}"><i class="fa fa-download"></i> Download QR Code </a>	                       
	                   	   </td>
	                    </tr>
                    @endforeach
		        </tbody>		       
		</table>

   		</div>
	</div>
</section>

@endsection
