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
                            <li><a href="#">Pay Salary</a></li>
                            <li><a href="{{ route('customer') }}">Pay Salary Details</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Pay Salary <span
                                        class="pull-right">{{ date('F Y') }}</span></h2>
                                <button type="button" id="json" class="btn btn-primary">To json</button>
                                <button type="button" id="csv" class="btn btn-success">To CSV</button>
                                <button type="button" id="create_pdf" class="btn btn-primary">To Pdf</button>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sl</th>
                                                    <th>Name</th>
                                                    <th>Picture</th>
                                                    <th>Salary</th>
                                                    <th>Month</th>
                                                    <th>Advance Salary</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pay_salary as $pay_salary_info)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $pay_salary_info->name }}</td>
                                                        <td><img width="25%"
                                                                src="{{ asset('uploads/employess') }}/{{ $pay_salary_info->photo }}"
                                                                alt=""></td>
                                                        <td>{{ $pay_salary_info->slaray }}
                                                        </td>
                                                        <td><span
                                                                class="label label-success">{{ date('F', strtotime('-1 month')) }}</span>
                                                        </td>
                                                        <td>{{ App\Models\AdvanceSalary::find($pay_salary_info->id)->advance_salary }}
                                                        </td>
                                                        <td>
                                                            @if ($pay_salary_info->status == 1)
                                                                <span class="label label-info">Advance Paid</span>
                                                            @else
                                                                <span class="label label-danger">Non Paid</span>
                                                            @endif
                                                        </td>
                                                        <td class="actions pr-5">
                                                            <a href="{{ url('/supplier/edit') }}/{{ $pay_salary_info->id }}"
                                                                class="on-default edit-row btn btn-primary btn-sm">Pay
                                                                Now</a>
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
