@extends('backend.layouts.master')
@section('content')
<style type="text/css">
    /*tree*/
    .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
    }
    .tree ul {
        margin-left:1em;
        position:relative
    }
    .tree ul ul {
        margin-left:.5em
    }
    .tree ul:before {
        content:"";
        display:block;
        width:0;
        position:absolute;
        top:0;
        bottom:0;
        left:0;
        border-left:1px solid
    }
    .tree li {
        margin:0;
        padding:0 1em;
        line-height:2em;
        color:#369;
        font-weight:700;
        position:relative
    }
    .tree ul li:before {
        content:"";
        display:block;
        width:10px;
        height:0;
        border-top:1px solid;
        margin-top:-1px;
        position:absolute;
        top:1em;
        left:0
    }
    .tree ul li:last-child:before {
        background:#fff;
        height:auto;
        top:1em;
        bottom:0
    }
    .indicator {
        margin-right:5px;
    }
    .tree li a {
        text-decoration: none;
        color:#369;
    }
    .tree li button, .tree li button:active, .tree li button:focus {
        text-decoration: none;
        color:#369;
        border:none;
        background:transparent;
        margin:0px 0px 0px 0px;
        padding:0px 0px 0px 0px;
        outline: 0;
    }
    /*tree*/
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Menu Permission</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Permission</li>
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
                <h3>Select Criteria</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form action="{{route('users.menu_permission.list')}}" method="get" id="myForm">
                      <div class="row">
                          <div class="form-group offset-md-2 col-md-2">
                              <label class="control-label">Role Name</label>
                          </div>
                          <div class="form-group col-md-4">

                              <select class="form-control form-control-sm" id="role_id" name="role_id">
                                  <option value="">Select Role</option>
                                  @foreach($roles as $role)
                                  <option value="{{$role->id}}" {{(@$role_id==$role->id)?"selected":""}}>{{$role->role_name}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-2">
                              <button type="submit" class="btn btn-success btn-block btn-sm">Search </button>
                          </div>
                      </div>
                  </form>
              </div><!-- /.card-body -->
              @if(isset($role_id) && !empty($role_id))
              <div class="card-body">
                <form method="post" action="{{route('users.menu_permission.store')}}" id="myForm">
                  {{csrf_field()}}
                    <div id="checkboxesTree">
                       <input type="hidden" name="role_id" value="{{$role_id}}">
                        <ul id="tree2">
                            @foreach($parents as $key => $parent)
                                <?php $child_menu = App\Models\Menu::where('parent', $parent->id)->where('status','1')->orderBy('sort', 'asc')->get();?>
                                @if(count($child_menu) > '0')
                                <li class="parentclass">
                                    <label><input style="display: none" name="menu_id[]" value="{{$parent->id}}" type="checkbox"/ {{(in_array(['menu_id'=>$parent->id], $inarray))?("checked"):""}}>{{$parent->menu_name}}</label>
                                    <ul>
                                        @foreach ($child_menu as $cchild_menu)
                                            <li><label><input class="parentcheck parentcheck{{$key}}" name="menu_id[]" value="{{$cchild_menu->id}}" type="checkbox" {{(in_array(['menu_id'=>$cchild_menu->id], $inarray))?("checked"):""}}/>  {{$cchild_menu->menu_name}}</label></li>
                                        @endforeach

                                    </ul>
                                </li>
                                @else
                                <li><label><input name="menu_id[]" value="{{$parent->id}}" type="checkbox" {{(in_array(['menu_id'=>$parent->id], $inarray))?("checked"):""}} />{{$parent->menu_name}}</label></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-sm" href="{{route("users.menu_permission")}}">Go Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
              </div>
              @endif

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
          role_id: {
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

  <script type="text/javascript">
    $(function(){
        $.fn.extend({
            treed: function (o) {
                var tree = $(this);
                tree.addClass("tree");
                tree.find('li').has("ul").each(function () {
                    var branch = $(this);
                    branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                    branch.addClass('branch');
                });
            }
        });


    $('#tree2').treed();
    });
</script>

<script type="text/javascript">
    $(document).on('click','.parentcheck',function(){
        var classs = $(this).attr('class');
        var res = classs.split(" ");
        var countchildcheck = $('.'+res[1]+':checked').length;
        if (countchildcheck > 0){
            $(this).parents('.parentclass').find('input:first').prop('checked', true);
        }else{
            $(this).parents('li').find('input:first').prop('checked', false);

        }
    });
</script>

@endsection
