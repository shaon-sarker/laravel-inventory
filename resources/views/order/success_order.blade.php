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
                            <li><a href="#">Success Order</a></li>
                            <li><a href="">Success Order Details</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Success Order</h3>
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
                                                    <th>Customer Name</th>
                                                    <th>Order Date</th>
                                                    <th>Order Status</th>
                                                    <th>Total Products</th>
                                                    <th>Subtotal</th>
                                                    <th>Vat</th>
                                                    <th>Total</th>
                                                    <th>Payment Status</th>
                                                    <th>Pay </th>
                                                    <th>Due</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($success_order as $success_order_info)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $success_order_info->name }}</td>
                                                        <td>{{ $success_order_info->order_date }}</td>
                                                        <td>
                                                            <span
                                                                class="badge badge-success">{{ $success_order_info->order_status }}</span>
                                                        </td>
                                                        <td>{{ $success_order_info->total_products }}</td>
                                                        <td>{{ $success_order_info->sub_total }}</td>
                                                        <td>{{ $success_order_info->vat }}</td>
                                                        <td>{{ $success_order_info->total }}</td>
                                                        <td>
                                                            <span
                                                                class="badge badge-info">{{ $success_order_info->payment_status }}</span>
                                                        </td>
                                                        <td>{{ $success_order_info->pay }}</td>
                                                        <td>{{ $success_order_info->due }}</td>
                                                        <td>
                                                            <a href="{{ url('/pending/view') }}/{{ $success_order_info->id }}"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="fa fa-eye">View</i></a>

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
