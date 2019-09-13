<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Employee Salary @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Employee Salary
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
                    <form novalidate id="entryForm" action="{{route('employee-salary.store')}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="designation">Employee<span class="text-danger">*</span></label>
                                        <select class="form-control select2 select2-hidden-accessible" required="true" name="employee" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="" selected="selected" disabled>Pick a employee...</option>
                                            <option value="1"></option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('employee') }}</span>
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="name">Bank& Branch Name<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="bank name and branch name" value="" required minlength="4" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="name">Bank AC No.<span class="text-danger">*</span></label>
                                        <input autofocus type="number" class="form-control" name="bank_no" placeholder="account number" value="" required minlength="4" maxlength="10">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="name">Bank AC Name<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="account name" placeholder="name" value="" required minlength="4" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <label for="name">Bank AC Name<span class="text-danger">*</span></label>
                                        <table class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <td >Type</td>
                                                    <td>Amount</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="40%">
                                                    </td>
                                                    <td width="60%">
                                                        <input autofocus type="number" class="form-control" name="name" placeholder="" value="" required style="width:60%">
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-feedback"> 
                        </div> 
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::route('feetype.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-refresh fa-plus-circle"></i> Add</button>
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
