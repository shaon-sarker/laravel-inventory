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
                                        <h4 class="text-right">TechPos</h4>

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
                                                <strong>{{ $customer_name->name }}</strong><br>
                                                <strong>{{ $customer_name->shopname }}</strong><br>
                                                {{ $customer_name->address }}<br>
                                                <abbr title="Phone">P:</abbr>{{ $customer_name->phone }}
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Order Date: </strong>{{ date('l jS \of F Y h:i:s A') }}</p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span
                                                    class="label label-pink">Pending</span></p>
                                            <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($contents as $content_info)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $content_info->name }}</td>
                                                            <td>{{ $content_info->qty }}</td>
                                                            <td>{{ $content_info->price }}</td>
                                                            <td>{{ $content_info->price * $content_info->qty }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-radius: 0px;">
                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-right"><b>Sub-total:</b>{{ Cart::subtotal() }}</p>
                                        {{-- <p class="text-right">Discout: 12.9%</p> --}}
                                        <p class="text-right">VAT: {{ Cart::tax() }}</p>
                                        <hr>
                                        <h3 class="text-right">TOTAL {{ Cart::total() }}</h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-inverse waves-effect waves-light"
                                            onclick="window.print()"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                                            data-target="#con-close-modal">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div> <!-- container -->

        </div> <!-- content -->
    </div>


    <!-----Modal Start----->
    <form action="{{ route('customer.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-success text-white">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title text-white">New Customer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Customer Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Customer Phone</label>
                                    <input type="number" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Customer Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Customer Shopname</label>
                                    <input type="text" name="shopname" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Customer Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Customer AccountHolder</label>
                                    <input type="text" name="account_holder" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Account Number</label>
                                    <input type="number" name="account_number" class="form-control" id="field-4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control" id="field-5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" id="field-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Add Customer</button>
                    </div>
                </div>
            </div>
        </div>
    </form><!-- /.modal -->
@endsection
