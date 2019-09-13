<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Salary Template @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            FeeType
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            {{-- <li><i class="fa icon-attendance"></i> Attendance</li>
            <li class="active">Employee</li> --}}
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="form-group">
                            <div class="box-tools pull-right">
                                <a class="btn btn-info btn-sm" href="{{ URL::route('salary-template.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                                {{-- <a class="btn btn-primary btn-sm" href="{{ URL::route('invoice.create') }}"><i class="fa fa-upload"></i> Upload File</a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="listDataTableWithSearch" class="table table-bordered table-striped list_view_table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th width="15%">#</th>
                                    <th width="30%">Name</th>
                                    <th width="30%">Type</th>
                                    <th width="25%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($salarytemps as $salarytemp)
                                    <tr class="{{$salarytemp->id}}">
                                        <td>
                                            {{$loop->iteration}}
                                        </td>
                                        <td>{{$salarytemp->name}}</td>
                                            @if (($salarytemp->type)==1)
                                                <td>Addition</td>
                                            @elseif(($salarytemp->type)==2)    
                                                <td>Deduction</td>
                                            @endif
                                        <td>
                                            {{-- <a class="btn btn-info py-2 px-3 mx-1 text-white" href="{{route('salary-template.show',$salarytemp->id)}}">Detail</a> --}}
                                            <a class="btn btn-warning py-2 px-3 mx-1 text-white" href="{{route('salary-template.edit',$salarytemp->id)}}">Edit</a>
                                            <a class="btn btn-danger py-2 px-3 mx-1 text-white btn-delete" id="btn-delete" href="{{route('salary-template.destroy',$salarytemp->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="15%">#</th>
                                    <th width="30%">Name</th>
                                    <th width="30%">Type</th>
                                    <th width="25%">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <form action="" method="post" id="form">
            @method('delete')
            @csrf
        </form>
    </section>
    <!-- /.content --> 
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            window.postUrl = '{{URL::Route("employee_attendance.status", 0)}}';
            window.changeExportColumnIndex = 7;
            window.changeExportColumnValue = ['Present', 'Absent'];
            window.excludeFilterComlumns = [0,4,5,6,7];
            HRM.attendanceInit();
        });
    </script>
@endsection
<!-- END PAGE JS-->
