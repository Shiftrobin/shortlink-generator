@extends('frontend.shortlink.layout.master')
@section('shortlink')

<main class="main-box">


<section class="container mt-5 mb-3">
	<div class="row">
		<div class="col-sm-12">
			   <img src="{{asset('public/frontend/img/aims.png')}}">
			   <h1 class="text-primary"> Short Link Generator Application</h1>
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
                          <th>Shorten Link</th>
                          <th>Original Link</th>
                          <th>Note</th>
                          <th>Status</th>
		            </tr>
		        </thead>
		        <tbody>
		         	 @foreach($allData as $key => $data)
	                    <tr class="{{$data->id}}">
	                      <td>{{$data->id}}</td>
                          @if ($data->status=='0')
                          <td><span style="color:red;font-weight:bold;">Please activate to view</span>  </td>
                          @else
                          <td> <a href="{{ route('shorten.link', $data->code) }}" target="_blank">{{ route('shorten.link', $data->code) }}</a></td>
                          @endif
                          <td><a href="{{$data->link}}" target="_blank"> {{$data->link}} </a> </td>
                          <td>{!! $data->note  !!}</td>
	                      <td>
	                        @if($data->status=='1')
	                              <span style="background-color:#16957C;padding:5px;color:white;">Active</span>
	                        @elseif($data->status=='0')
	                              <span style="background-color:#E33C2F;padding:5px;color:white;">Inactive</span>
	                        @endif
	                      </td>
	                    </tr>
                    @endforeach
		        </tbody>
		</table>

   		</div>
	</div>
</section>

@endsection
