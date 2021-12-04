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
                            <div class="panel-heading">
                                <h3 class="panel-title">Customer</h3>
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
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Supplier type</th>
                                                    <th>Shop Name</th>
                                                    <th>Picture</th>
                                                    <th>Account Holder</th>
                                                    <th>Account Number</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($suppliers as $supplier_info)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $supplier_info->name }}</td>
                                                        <td>{{ $supplier_info->email }}</td>
                                                        <td>{{ $supplier_info->phone }}</td>
                                                        <td>{{ $supplier_info->address }}</td>
                                                        <td>{{ $supplier_info->type }}</td>
                                                        <td>{{ $supplier_info->shop }}</td>
                                                        <td><img width="50%"
                                                                src="{{ asset('uploads/suppliers') }}/{{ $supplier_info->photo }}"
                                                                alt=""></td>
                                                        <td>{{ $supplier_info->account_holder }}</td>
                                                        <td>{{ $supplier_info->account_number }}</td>

                                                        <td>
                                                            @if ($supplier_info->status == 1)
                                                                <span class="label label-info">Active</span>
                                                            @else
                                                                <span class="label label-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td class="actions pr-5">
                                                            <a href="{{ url('/supplier/edit') }}/{{ $supplier_info->id }}"
                                                                class="on-default edit-row"><i
                                                                    class="fa fa-pencil"></i></a>
                                                            <a href="{{ url('/supplier/delete') }}/{{ $supplier_info->id }}"
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
