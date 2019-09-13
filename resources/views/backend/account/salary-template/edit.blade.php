<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Salary Template @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Salary Template
            {{-- <small>@if($teacher) Update @else Add New @endif</small> --}}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            {{-- <li><a href="{{URL::route('teacher.index')}}"><i class="fa icon-teacher"></i> Teacher</a></li> --}}
        </ol>
    </section>

    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="{{route('salary-template.update',$salarytemp->id)}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="name" value="{{old('name',$salarytemp->name)}}" required minlength="4" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="designation">Type<span class="text-danger">*</span></label>
                                        <select class="form-control select2 select2-hidden-accessible" required="true" name="type" value="{{old('type',$salarytemp->type)}}" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected" disabled>Select your choice</option>
                                            <option value="1" {{($salarytemp->type) == 1 ? 'selected' : '' }}>Addition</option>
                                            <option value="2" {{($salarytemp->type) == 2 ? 'selected' : ''}}>Deduction</option>
                                        </select>
                                        {{-- <span class="fa fa-info form-control-feedback"></span> --}}
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::route('salary-template.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-refresh fa-plus-circle"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            Generic.initCommonPageJS();
        });
    </script>
@endsection
<!-- END PAGE JS-->
