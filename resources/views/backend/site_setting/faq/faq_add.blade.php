@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Q&A</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Q&A</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>
                  @if(isset($editData))
                  Edit Q&A
                  @else
                  Add Q&A
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('site-setting.faq.view')}}"><i class="fa fa-list"></i> Q&A List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('site-setting.faq.update',$editData->id):route('site-setting.faq.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>FAQ Category</label>
                      <select name="faq_category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($faq_categories as $category)
                        <option value="{{$category->id}}" {{(@$editData->faq_category_id==$category->id)?"selected":""}}>{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Question</label>
                      <input type="text" name="question" value="{{@$editData->question}}" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                      <label>Answer</label>
                      <textarea name="answer" class="form-control" rows="7">{{@$editData->answer}}</textarea>
                    </div>
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
                    </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          faq_category_id: {
            required: true,
          },
          question: {
            required: true,
          },
          answer: {
            required: true,
          },
        },
        messages: {
          
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