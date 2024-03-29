@extends('layouts.dashboad')
@section('content')
    @include('layouts.nav')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Inventory</a></li>
                            <li><a href="#">Employee</a></li>
                            <li><a href="{{ route('employee') }}">Employee Details</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Employee</h3>
                                <button type="button" id="json" class="btn btn-primary">To json</button>
                                <button type="button" id="csv" class="btn btn-success">To CSV</button>
                                <button type="button" id="create_pdf" class="btn btn-primary">To Pdf</button>
                                <a href="{{ route('employee') }}" class="pull-right btn btn-info btn-sm">Add Employee</a>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Picture</th>
                                                    <th>Salary</th>
                                                    <th>City</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employee as $employee_info)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $employee_info->name }}</td>
                                                        <td>{{ $employee_info->email }}</td>
                                                        <td>{{ $employee_info->phone }}</td>
                                                        <td>{{ $employee_info->address }}</td>
                                                        <td><img width="50%"
                                                                src="{{ asset('uploads/employess') }}/{{ $employee_info->photo }}"
                                                                alt=""></td>
                                                        <td>{{ $employee_info->slaray }}</td>
                                                        <td>{{ $employee_info->city }}</td>
                                                        <td>
                                                            @if ($employee_info->status == 1)
                                                                <span class="label label-info">Active</span>
                                                            @else
                                                                <span class="label label-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td class="actions pr-5">
                                                            <a href="{{ url('/employee/edit') }}/{{ $employee_info->id }}"
                                                                class="on-default edit-row"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            <a href="{{ url('/employee/delete') }}/{{ $employee_info->id }}"
                                                                class="on-default remove-row"><i
                                                                    class="fa fa-trash-o"></i></a>
                                                            <a href="#" class="on-default remove-row"><i
                                                                    class="fa fa-up-arrow"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        });

        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break

            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break

            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break

            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break
            }
        @endif

        $('#json').on('click', function() {
            $("#datatable").tableHTMLExport({
                type: 'json',
                filename: 'sample.json'
            });
        })
        $('#csv').on('click', function() {
            $("#datatable").tableHTMLExport({
                type: 'csv',
                filename: 'sample.csv'
            });
        })
        // $('#pdf').on('click', function() {
        //     $("#datatable").tableHTMLExport({
        //         type: 'pdf',
        //         filename: 'sample.pdf'
        //     });
        // })
    </script>
@endsection
