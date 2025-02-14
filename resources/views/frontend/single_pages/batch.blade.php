@extends('frontend.layouts.master')
@section('content')
<main class="no-main">
     {{-- <div class="ps-breadcrumb">
         <div class="container">
             <ul class="ps-breadcrumb__list">
                 <li class="active"><a href="{{url('')}}">Home</a></li>
                 <li><a href="javascript:void(0);">All Batch</a></li>
             </ul>
         </div>
     </div> --}}
     <section class="section--about ps-page--business">

         <div class="container">
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section class="col-md-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card mt-40 mb-80">
                  <div class="card-header">
                    <h3 style="text-align:center;color:green;">Registered Member List </h3>


                      <center>
                        <h3 style="width: 150px;">
                       <label for="">SSC Batch</label>
                        <select name="batch_filter" id="batch_filter" class="form-control" style="font-size:15px;">
                            <option value="">Select Batch</option>
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
                        </h3>
                        </center>

                  </div><!-- /.card-header -->
                  <div class="card-body">
                    {{-- <table id="batch_table" class="table table-bordered table-hover table-sm table-responsive"> --}}
                     <table class="table table-bordered table-hover table-sm table-responsive batch_table">
                      <thead>
                        <tr>
                          <th>Registration No.</th>
                          <th>Bangla Name</th>
                          <th>Photo</th>
                          <th>Profession & Workplace</th>
                          <th>Mobile Number</th>
                          <th>E-mail Address</th>
                          <th>Blood Group</th>
                          <th>Permanent Address</th>
                          <th>Batch</th>
                        </tr>
                      </thead>
                      <tbody>



                      </tbody>
                    </table>
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->



     </section>
 </main>


 @push('page_scripts')
<script>

        $(document).ready(function(){

        fetch_data();

        function fetch_data(batch = '')
        {
        $('.batch_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url:"{{ route('batch') }}",
        type: 'GET',
        data: {batch:batch}
        },
        columns:[
        {
            data: 'member_id',
            name: 'member_id'
           
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'image',
            name: 'image',

            'render': function( data, type, full, meta ) {
                return '<img src=\'https://connectbzmghs.com/public/upload/user_images/' + data + '\' height=\'50\'/>';
            //   return '<img src=\'{{url('/public/upload/user_images/')}}' + data + '\' height=\'50\'/>';
            }

        },
        {
            data: 'profession',
            name: 'profession'
        },
        {
            data:'mobile',
            name:'mobile'
        },
        {
            data: 'email',
            name: 'email'
        },
        {
            data:'blood_group',
            name:'blood_group'
        },
        {
            data:'address',
            name:'address'
        },
        {
            data: 'batch',
            name: 'batch',
            orderable: false
        }
        ]
        });
        }

        $('#batch_filter').change(function(){
        var batch_value = $('#batch_filter').val();

        $('.batch_table').DataTable().destroy();

        fetch_data(batch_value);
        });

        });


</script>
@endpush

@endsection
