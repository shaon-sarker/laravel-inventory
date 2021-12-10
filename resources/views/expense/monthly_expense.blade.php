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
                            <li><a href="#">Customer</a></li>
                            <li><a href="{{ route('customer') }}">Customer Details</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div>
                                <a href="  {{ route('january.expense') }}" class="btn btn-info">January</a>
                                {{-- <a href="  {{ route('february.expense') }}" class="btn btn-success">February</a> --}}
                                <a href="  {{ route('march.expense') }}" class="btn btn-primary">March</a>
                                <a href="  {{ route('april.expense') }}" class="btn btn-warning">April</a>
                                <a href="  {{ route('may.expense') }}" class="btn btn-danger">May</a>
                                <a href="  {{ route('june.expense') }}" class="btn btn-primary">June</a>
                                <a href="  {{ route('july.expense') }}" class="btn btn-warning">July</a>
                                <a href="  {{ route('august.expense') }}" class="btn btn-info">August</a>
                                <a href="  {{ route('september.expense') }}" class="btn btn-success">September</a>
                                <a href="  {{ route('october.expense') }}" class="btn btn-info">October</a>
                                <a href="  {{ route('november.expense') }}" class="btn btn-danger">November</a>
                                <a href="  {{ route('december.expense') }}" class="btn btn-primary">December</a>
                            </div>
                            <div class="panel-heading">
                                <h3 class="panel-title">Expense <a href="{{ route('expense') }}"
                                        class="btn btn-sm btn-info pull-right">Add Expense</a></h3>
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
                                                    <th>Expense Details</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($month_expense as $month_expense_info)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $month_expense_info->details }}</td>
                                                        <td>{{ $month_expense_info->amount }}</td>

                                                        <td>
                                                            @if ($month_expense_info->status == 1)
                                                                <span class="label label-info">Active</span>
                                                            @else
                                                                <span class="label label-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                        {{-- <h4 class="text-center text-danger">Monthly Total Purchase :
                                            {{ $monthly_total_purchae }}৳
                                        </h4> --}}
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
