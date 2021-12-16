@extends('layouts.dashboad')
@section('content')
    {{-- @include('layouts.nav') --}}
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Invoice</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li><a href="#">Pages</a></li>
                            <li class="active">Invoice</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h4 class="text-right">TechInventory</h4>
                                    </div>
                                    <div class="pull-right">
                                        <h4>Invoice # <br>
                                            <strong>{{ date('d/m/y') }}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-30">
                                            <address>
                                                <strong>{{ $orders->name }}</strong><br>
                                                <strong>{{ $orders->shopname }}</strong><br>
                                                {{ $orders->address }}<br>
                                                <abbr title="Phone">P:</abbr>{{ $orders->phone }}
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Order Date: </strong>{{ date('l jS \of F Y h:i:s A') }}</p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span
                                                    class="label label-pink">{{ $orders->order_status }}</span></p>
                                            <p class="m-t-10"><strong>Order ID: </strong>{{ $orders->id }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product Name</th>
                                                        <th>Product Code</th>
                                                        <th>Quantity</th>
                                                        <th>Product Price</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders_details as $orders_details_info)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $orders_details_info->prodruct_name }}</td>
                                                            <td>{{ $orders_details_info->product_serialno }}</td>
                                                            <td>{{ $orders_details_info->product_quantity }}</td>
                                                            <td>{{ $orders_details_info->total }}</td>
                                                            <td>{{ $orders_details_info->total * $orders_details_info->product_quantity }}
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9">
                                        <h4>
                                            <b>Payment By:</b> <span
                                                class="badge badge-info">{{ $orders->payment_status }}</span>
                                        </h4>
                                        <h5><b>Pay:</b>{{ $orders->pay }}</h5>
                                        <h5><b>Due:</b>{{ $orders->due }}</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <p class=" text-right">
                                            <b>Sub-total:</b>{{ $orders->sub_total }}
                                        </p>
                                        {{-- <p class="text-right">Discout: 12.9%</p> --}}
                                        <p class="text-right">VAT: {{ $orders->vat }}</p>
                                        <hr>
                                        <h3 class="text-right">TOTAL {{ $orders->total }}</h3>
                                    </div>

                                </div>
                                <hr>
                                @if ($orders->order_status == 'success')
                                @else
                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-inverse waves-effect waves-light"
                                                onclick="window.print()"><i class="fa fa-print"></i></a>
                                            <a href="{{ url('/pending/done') }}/{{ $orders->id }}"
                                                class="btn btn-success btn-sm"><i class="fa fa-plus-square">Done</i></a>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>

                </div>
            </div> <!-- container -->

        </div> <!-- content -->
    </div>


    <!-----Modal Start----->
    {{-- <form action="{{ url('/final-invoice/insert') }}" method="POST">
        @csrf
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-success text-white">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title text-white">Invoice of {{ $customer_name->name }}<span
                                class="pull-right">Total : {{ Cart::total() }}</span></h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" value="{{ $customer_name->id }}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Payment</label>
                                    <select name="payment_status" class="form-control">
                                        <option value="HandCash">HandCash</option>
                                        <option value="Cheaque">Cheaque</option>
                                        <option value="Due">Due</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Pay</label>
                                    <input type="text" name="pay" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Due</label>
                                    <input type="text" name="due" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Order Date</label>
                                    <input type="text" class="form-control" name="order_date"
                                        value="{{ date('d-m-y') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Order Status</label>
                                    <input type="text" name="order_status" value="pending" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Total Products</label>
                                    <input type="text" name="total_products" value="{{ Cart::count() }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Sub Total</label>
                                    <input type="text" name="sub_total" value="{{ Cart::subtotal() }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">VAT/TAX</label>
                                    <input type="text" name="vat" value="{{ Cart::tax() }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Total</label>
                                    <input type="text" name="total" value="{{ Cart::total() }}" class="form-control">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Add Invoice</button>
                </div>
            </div>
        </div>
        </div>
    </form> --}}
    <!-- /.modal -->
@endsection
@section('footer_script')
    <script>
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
    </script>
@endsection
